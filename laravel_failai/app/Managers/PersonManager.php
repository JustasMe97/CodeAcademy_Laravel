<?php

namespace App\Managers;

use App\Http\Requests\PersonRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PersonManager
{
    public function createCustomer(PersonRequest $request): Person
    {
        DB::beginTransaction();

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make(Str::random(8)),   // random password
        ]);

        $personArray = $request->all() + ['user_id' => $user->id];

        $person = Person::create($personArray);

        DB::commit();

        return $person;
    }
    public function createPersonForExistingUser(PersonRequest $request, User $user): Person
    {
        $personArray = $request->all() + ['user_id' => $user->id];
        $person = Person::create($personArray);

        return $person;
    }

    public function getPersons(): Collection
    {
        $persons = Person::query()->get();
        return $persons;
    }

    public function updatePerson(PersonUpdateRequest $request, Person $person): Person
    {
        $person->update($request->all());
        return $person;
    }

    public function deletePerson(Person $person): void
    {
        $person->delete();
    }

}
