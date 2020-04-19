<?php

namespace App\Http\Controllers;

use App\Http\CustomServices\EducationsSyncService;
use App\Http\CustomServices\ProjectsSyncService;
use App\Http\Requests\UserEditRequest;
use App\Skill;
use App\User;
use Illuminate\Support\Facades\Storage;
use Vedmant\FeedReader\Facades\FeedReader;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('projects','skills')->get()->chunk(3);
        $news = FeedReader::read('https://dev.by/news?tag=RSS')->get_items(0,3);
        return view('main', compact('users', 'news'));
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->load('projects','educations','skills');
        return view('users.users_show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = $user->load('projects', 'skills', 'educations');
        $skills = Skill::pluck('name', 'id');
        return view('users.users_edit', compact('user', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserEditRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $user = $user->load('projects','educations');
        $data = $request->only('last_name','first_name','middle_name','email','skype','linkedin','cv','image','skills', 'projects', 'educations');
        $projectsSync = new ProjectsSyncService($user->projects->pluck('id')->toArray(), $data['projects']);
        $educationsSync = new EducationsSyncService($user->educations->pluck('id')->toArray(), $data['educations']);

        if($request->hasFile('image')){
            $directory = 'public/users/'.$user->id;
            $file = $request->file('image');
            $data['image'] = $fileName = $file->getClientOriginalName();
            Storage::delete($directory.'/'.($user->image ?? ''));
            $file->storeAs($directory, $fileName);
        }

        \DB::transaction( function () use ($user, $data, $projectsSync, $educationsSync) {
            $projectsSync->process();
            $educationsSync->process();
            $user->update($data);
            $user->skills()->sync($data['skills'] ?? []);
        });

        return redirect()->route('users.show', ['user' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
