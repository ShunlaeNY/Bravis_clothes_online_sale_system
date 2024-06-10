<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    public function search(Request $request)
{
    $columns = [
        'email' => 'Email',
        'address' => 'Address',
        'phonenumber' => 'Phone Number'
    ];

    $query = DB::table('customers')->where('status', '=', 'Active');

    if (!empty($request->search)) {
        $searchInput = $request->search;
        $searchTerms = explode(' ', $searchInput);

        $query->where(function ($subQuery) use ($columns, $searchInput, $searchTerms) {
            // Search through other columns
            foreach ($columns as $column => $label) {
                $subQuery->orWhere($column, 'LIKE', '%' . $searchInput . '%');
            }

            // Search by combining fname and lname
            $subQuery->orWhere(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', '%' . $searchInput . '%');
        });
    }

    $customerlists = $query
        ->select('customers.*')
        ->orderBy('status', 'asc')
        ->paginate(5);

    return view('customer.list', compact('customerlists'));
}

    

}