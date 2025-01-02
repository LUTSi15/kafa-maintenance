<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function teacherEdit()
    {
        // Retrieve data from the 'teacher' table
        $teacher = Teacher::where('user_id', Auth::id())->firstOrFail();

        $breadcrumbs = [
            ['name' => 'Profile', 'url' => route('profile.teacherEdit')],
        ];

        return view('ManageProfile.editTeacherProfile', [
            'user' => Auth::user(),
            'teacher' => $teacher,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function guardianEdit()
    {
        // Retrieve data from the 'guardian' table
        $guardian = Guardian::where('user_id', Auth::id())->firstOrFail();

        $breadcrumbs = [
            ['name' => 'Profile', 'url' => route('profile.guardianEdit')],
        ];

        return view('ManageProfile.editParentProfile', [
            'user' => Auth::user(),
            'guardian' => $guardian,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function teacherUpdate(Request $request, Teacher $teacher)
    {

        $validatedData = $request->validate([
            'kafaName' => 'nullable|string|max:255',
            'phoneNum' => 'nullable|string|max:15',
            'icNum' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female',
            'race' => 'nullable|string|max:50',
            'age' => 'nullable|integer|min:18',
        ]);

        $teacher->update($validatedData);

        return redirect()->route('profile.teacherEdit')->with('status', 'profile-updated');
    }

    public function guardianUpdate(Request $request, Guardian $guardian)
    {
        // Validate the request
        $validated = $request->validate([
            'occupation' => 'nullable|string|max:255',
            'phoneNum' => 'nullable|string|max:15',
            'icNum' => 'nullable|string|max:20|unique:guardians,icNum,' . $guardian->id,
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female',
            'race' => 'nullable|string|max:50',
            'age' => 'nullable|integer|min:18',
        ]);

        // Update the guardian with validated data
        $guardian->update($validated);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'profile-updated');
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function listParents()
    {
        // Retrieve users with the 'guardian' role and their associated Guardian information
        $guardians = Guardian::whereHas('user', function ($query) {
            $query->where('role', 'guardian'); // Assuming 'role' is a field in the User table
        })->with('user')->get();

        $breadcrumbs = [
            ['name' => 'List of Parents', 'url' => route('kafa.listParents')],
        ];

        return view('ManageProfile.kafaViewList', compact('guardians', 'breadcrumbs'));
    }

    public function viewParent(Guardian $guardian)
    {
        $breadcrumbs = [
            ['name' => 'List of Parents', 'url' => route('kafa.listParents')],
            ['name' => 'View Detail Parents', 'url' => route('kafa.viewParent', $guardian->id)],
        ];

        // Pass the guardian details to the view
        return view('ManageProfile.kafaViewParentDetail', compact('guardian', 'breadcrumbs'));
    }

    public function deleteParent(Guardian $guardian)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Delete the user associated with the guardian
            $user = $guardian->user; // Assuming 'user' relationship exists in the Guardian model
            if ($user) {
                $user->delete();
            }

            // Delete the guardian record
            $guardian->delete();

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('kafa.listParents')->with('success', 'Parent profile deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();

            // Redirect with error message
            return redirect()->route('kafa.listParents')->with('error', 'Failed to delete parent profile. Please try again.');
        }
    }

    public function listStudents()
    {
        $breadcrumbs = [
            ['name' => 'List of Student', 'url' => route('listStudents')],
        ];

        // Retrieve all students with their corresponding guardians and guardian names
        $students = Student::with(['guardian' => function ($query) {
            $query->join('users', 'users.id', '=', 'guardians.user_id')
                ->select('guardians.*', 'users.name as guardian_name'); // Retrieve the guardian's name from the 'users' table
        }])->get();

        return view('ManageProfile.viewListOfStudent', compact('students', 'breadcrumbs'));
    }

    public function viewStudent(Student $student)
    {
        $breadcrumbs = [
            ['name' => 'List of Student', 'url' => route('listStudents')],
            ['name' => 'View Detail Student', 'url' => route('viewStudent', $student->id)],
        ];

        // Retrieve guardian information using the relationship
        $guardian = $student->guardian;

        // Pass the student details to the view
        return view('ManageProfile.viewDetailStudent', compact('student', 'guardian', 'breadcrumbs'));
    }

    public function deleteStudent(Student $student)
    {
        try {
            // Delete the student
            $student->delete();

            // Redirect back with a success message
            return redirect()->route('listStudents')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->route('listStudents')->with('error', 'An error occurred while deleting the student.');
        }
    }

    public function registerParent()
    {
        $breadcrumbs = [
            ['name' => 'Register Parents', 'url' => route('kafa.registerParent')],
        ];

        return view('ManageProfile.kafaRegisterParent', compact('breadcrumbs'));
    }

    public function registerTeacher()
    {
        $breadcrumbs = [
            ['name' => 'Register Teacher', 'url' => route('kafa.registerTeacher')],
        ];

        return view('ManageProfile.kafaRegisterTeacher', compact('breadcrumbs'));
    }

    public function storeParent(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create a new user
            $user = User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'guardian', // Set the role to guardian
            ]);

            // Create a guardian record linked to the user
            Guardian::create([
                'user_id' => $user->id,
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('kafa.listParents')->with('success', 'Parent account created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Redirect with error message
            return redirect()->back()->with('error', 'Failed to create parent account. Please try again.');
        }
    }

    public function storeTeacher(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'kafaName' => 'required|string|max:255',
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create a new user
            $user = User::create([
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'teacher', // Set the role to teacher
            ]);

            // Create a new teacher record linked to the user
            Teacher::create([
                'user_id' => $user->id, // Link to the User table
                'kafa_name' => $validated['kafaName'],
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect back to the form with success message
            return redirect()->route('kafa.registerTeacher')->with('success', 'Teacher account created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Redirect back to the form with error message
            return redirect()->route('kafa.registerTeacher')->with('error', 'Failed to create teacher account. Please try again.');
        }
    }

    public function registerStudent()
    {
        // Retrieve all guardians with their names
        $guardians = Guardian::with('user:id,name')->get(); // Assuming a relationship exists between Guardian and User

        $breadcrumbs = [
            ['name' => 'Register Student', 'url' => route('kafa.registerStudent')],
        ];
        // Pass the guardians to the view
        return view('ManageProfile.kafaRegisterStudent', compact('guardians', 'breadcrumbs'));
    }

    public function storeStudent(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'guardian_id' => 'required|exists:guardians,id',
            'icNum' => 'required|string|max:255|unique:students,icNum',
            'studentName' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'race' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'birthDate' => 'required|date',
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create a new student record
            Student::create([
                'guardian_id' => $validated['guardian_id'],
                'icNum' => $validated['icNum'],
                'studentName' => $validated['studentName'],
                'gender' => $validated['gender'],
                'race' => $validated['race'],
                'age' => $validated['age'],
                'birthDate' => $validated['birthDate'],
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect back to the form with a success message
            return redirect()->route('kafa.registerStudent')->with('success', 'Student account created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Redirect back to the form with an error message
            return redirect()->route('kafa.registerStudent')->with('error', 'Failed to create student account. Please try again.');
        }
    }
}
