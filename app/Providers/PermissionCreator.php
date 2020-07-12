<?php

use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

if (Schema::hasTable('permissions')) {

    $permission =  Permission::where('name', 'View Applicants')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Applicants',
        ]);
    }

    $permission =  Permission::where('name', 'View Batch')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Batch',
        ]);
    }

    $permission =  Permission::where('name', 'View Schedule')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Schedule',
        ]);
    }

    $permission =  Permission::where('name', 'View Courses')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Courses',
        ]);
    }

    $permission =  Permission::where('name', 'View Student')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Student',
        ]);
    }

    $permission =  Permission::where('name', 'View Trainers')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Trainers',
        ]);
    }
    $permission =  Permission::where('name', 'View Users')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Users',
        ]);
    }
    $permission =  Permission::where('name', 'View Permissions')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Permissions',
        ]);
    }
    $permission =  Permission::where('name', 'View Roles')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'View Roles',
        ]);
    }

    $permission =  Permission::where('name', 'Admit Student')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Admit Student',
        ]);
    }

    $permission =  Permission::where('name', 'Update Student')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Student',
        ]);
    }

    $permission =  Permission::where('name', 'Create User')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create User',
        ]);
    }

    $permission =  Permission::where('name', 'Update User')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update User',
        ]);
    }

    $permission =  Permission::where('name', 'Delete User')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete User',
        ]);
    }

    $permission =  Permission::where('name', 'Delete Applicant')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Applicant',
        ]);
    }

    $permission =  Permission::where('name', 'Create Permission')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create Permission',
        ]);
    }

    $permission =  Permission::where('name', 'Update Permission')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Permission',
        ]);
    }

    $permission =  Permission::where('name', 'Delete Permission')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Permission',
        ]);
    }
    $permission =  Permission::where('name', 'Create Role')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create Role',
        ]);
    }
    $permission =  Permission::where('name', 'Update Role')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Role',
        ]);
    }
    $permission =  Permission::where('name', 'Delete Role')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Role',
        ]);
    }
    $permission =  Permission::where('name', 'Create Course')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create Course',
        ]);
    }
    $permission =  Permission::where('name', 'Update Course')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Course',
        ]);
    }
    $permission =  Permission::where('name', 'Delete Course')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Course',
        ]);
    }
    $permission =  Permission::where('name', 'Create Batch')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create Batch',
        ]);
    }
    $permission =  Permission::where('name', 'Update Batch')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Batch',
        ]);
    }
    $permission =  Permission::where('name', 'Delete Batch')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Batch',
        ]);
    }

    $permission =  Permission::where('name', 'Create Schedule')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Create Schedule',
        ]);
    }
    $permission =  Permission::where('name', 'Update Schedule')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Schedule',
        ]);
    }
    $permission =  Permission::where('name', 'Delete Schedule')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Delete Schedule',
        ]);
    }
    $permission =  Permission::where('name', 'Update Payment')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update Payment',
        ]);
    }

    $permission =  Permission::where('name', 'Update System')->first();
    if (!$permission) {
        Permission::create([
            'name' => 'Update System',
        ]);
    }
}