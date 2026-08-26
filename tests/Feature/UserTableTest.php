<?php

use Illuminate\Support\Facades\Schema;

it('has the expected user fields', function () {
    expect(Schema::hasColumn('users', 'name'))->toBeTrue()
        ->and(Schema::hasColumn('users', 'email'))->toBeTrue()
        ->and(Schema::hasColumn('users', 'phone'))->toBeTrue()
        ->and(Schema::hasColumn('users', 'address'))->toBeTrue()
        ->and(Schema::hasColumn('users', 'role'))->toBeTrue();
});
