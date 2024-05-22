<?php

namespace App\Http\Controllers;

use App\Company;
use App\Country;
use App\Invoice;
use App\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use App\Helper\DNA;
use Illuminate\Support\Facades\Route;
use Image;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Companies extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = false;
        // $companies = Company::orderBy('created_at', 'DESC')->get();

        return view('company.view_list_of_companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $_countries = Country::orderBy('name', 'ASC')->get();

        return view('company.add_company', compact('_countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (!empty($request)) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'address_1' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'postcode' => 'required',
                        'email' => 'required',
                        'phone' => 'required',
                        'taxRate' => 'required',
                            ], [
                        'name.required' => 'Please enter name',
                        'address_1.required' => 'Please enter address',
                        'city.required' => 'Please enter city',
                        'state.required' => 'Please enter state',
                        'postcode.required' => 'Please enter postcode',
                        'taxRate.required' => 'Please enter Tax Rate or set to 0',
                        'email.required' => 'Please enter email address',
                        'phone.required' => 'Please enter contact number',
                            ]
            );

            if ($validator->fails()) {
                \Session::flash('company_add_fail', "");
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $company = new Company();
                $company->CountryId = $request->country;
                $company->name = $request->name;
                $company->address_1 = $request->address_1;
                $company->address_2 = $request->address_2;
                $company->email = $request->email;
                $company->phone = $request->phone;
                $_filename = $request->name;
                $name = "";
                if ($file = $request->hasFile('logo')) {
                    $image = $request->file('logo');
                    $name = preg_replace('/\s+/', '_', $_filename);
                    $filename = $name . '.' . $image->getClientOriginalExtension();
                    $path = public_path('assets/images/company_logo/');
                    $image->move($path, $filename);
                } else {
                    $name = 'default-company.png';
                }
                $company->logo = $filename;
                $company->taxId = $request->taxId;
                $company->taxName = $request->taxName;
                $company->taxRate = $request->taxRate;
                $company->invoiceId = $request->invoiceId;
                $company->footerTitle = $request->footerTitle;
                $company->footerMessage = $request->footerMessage;
                $company->footerSignature = $request->footerSignature;
                $company->save();
            }

            \Session::flash('company_add_success', "");
            $companies = Company::orderBy('created_at', 'DESC')->get();

            return redirect()->route('company-list', ['companies' => $companies]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $company = Company::where('id', $id)->first();
        $invoices = Invoice::where('companyId', $id)->orderBy('created_at', 'DESC')->get();

        $invoice_details = array();
        foreach ($invoices as $inv) {
            $invoice_details = InvoiceDetail::where('invoiceId', $inv->id)->get();
        }

        return view('company.view_company', compact('company', 'invoices', 'invoice_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $company = Company::where('id', $id)->first();
        $_countries = Country::orderBy('name', 'ASC')->get();
        return view('company.edit_company', compact('company', '_countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company             $company
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $_updateCompany = Company::findorfail($id);
        if (!empty($request)) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'address_1' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'postcode' => 'required',
                        'email' => 'required',
                        'phone' => 'required',
                        'taxRate' => 'required',
                            ], [
                        'name.required' => 'Please enter name',
                        'address_1.required' => 'Please enter address',
                        'city.required' => 'Please enter city',
                        'state.required' => 'Please enter state',
                        'postcode.required' => 'Please enter postcode',
                        'taxRate.required' => 'Please enter Tax Rate or set to 0',
                        'email.required' => 'Please enter email address',
                        'phone.required' => 'Please enter contact number',
                            ]
            );

            if ($validator->fails()) {
                \Session::flash('company_edit_fail', "");
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $_updateCompany->CountryId = $request->country;
                $_updateCompany->name = $request->name;
                $_updateCompany->address_1 = $request->address_1;
                $_updateCompany->address_2 = $request->address_2;
                $_updateCompany->city = $request->city;
                $_updateCompany->state = $request->state;
                $_updateCompany->postcode = $request->postcode;
                $_updateCompany->email = $request->email;
                $_updateCompany->phone = $request->phone;

                $_filename = $request->name;
                $name = "";
                if ($file = $request->hasFile('logo')) {
                    $image = $request->file('logo');
                    $name = preg_replace('/\s+/', '_', $_filename);
                    $filename = $name . '.' . $image->getClientOriginalExtension();
                    $path = public_path('assets/images/company_logo/');
                    $image->move($path, $filename);
                } else {
                    $filename = $_updateCompany->logo;
                }

                $_updateCompany->logo = $filename;
                $_updateCompany->taxId = $request->taxId;
                $_updateCompany->taxName = $request->taxName;
                $_updateCompany->taxRate = $request->taxRate;
                $_updateCompany->invoiceId = $request->invoiceId;
                $_updateCompany->footerTitle = $request->footerTitle;
                $_updateCompany->footerMessage = $request->footerMessage;
                $_updateCompany->footerSignature = $request->footerSignature;
                $_updateCompany->save();
            }

            \Session::flash('company_edit_success', "");
            $companies = Company::orderBy('created_at', 'DESC')->get();
            return redirect()->route('company-list', ['companies' => $companies]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        
    }

}
