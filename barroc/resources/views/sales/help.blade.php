@extends('layouts.master')

@section('nav-links')
    <li><a href="/">Customers</a></li>
@endsection

@section('content')
    <div class="container">
        <h1>Help</h1>
        <p>Als u een nieuwe klant wil toevoegen moet u zorgen dat alle benodigde data correct is ingevuld</p>
        <p>De regels zijn:</p>
        <ul>
            <li>De naam moet ingevuld zijn En minimaal 5 letters lang zijn.</li>
            <li>Het telefoon nummer moet 8 nummers lang zijn.</li>
            <li>De adress gegevens moeten allemaal geldig zijn.</li>
            <li>Het banknummer moet geldig zijn.</li>
        </ul>

        <h1>Help</h1>
        <p>if you want to add a new customer you need to make sure all the nececary data is filled in.</p>
        <p>The rules are:</p>
        <ul>
            <li>The name has to be filled in and be a minimum of 6 characters</li>
            <li>The phone number needs to be a minimum of 6 characters</li>
            <li>All adress info needs to be valid</li>
            <li>The bank account number needs to be valid</li>
        </ul>
    </div>




    
    @endsection
