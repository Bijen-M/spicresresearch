@extends('admin.layouts.master')

@section('title', 'Profile')

@section('content')
<div class="mainBlockPage">
    <div class="topProfileBlock">
        <div class="row">
            <div class="col* col-md-12 col-lg-12 col-xl-5 topProfileBlockLeft">
                <div class="card">
                    <div class="profileBox">
                        <div class="topBgBox">
                            <h2>{{ $user->title }} {{ $user->name }}</h2>
                            <p class="profileFaculty"></p>

                            <div class="d-flex">

                                <div class="imageOutercontainer">
                                    <div class="imageInner">
                                        <img src="{{ $user->image ? 'uploads/users/'.$user->roll_no.'/'.$user->image : 'backend/users/images/user-'.$user->gender.'.jpg' }}" alt="title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btmProfileInfos">
                            <ul>
                                <li>{{ $user->current_place }} {{ $user->current_district }}</li>

                                <li>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </li>

                                <li>{{ $user->contact_number }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col* col-md-12 col-lg-12 col-xl-7 topProfileBlockRight">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title"><i class="icofont-calendar"></i>About</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--<div class="userProfileDesc">
                            <p>As Marketing Graphic Designer, your primary responsibility is to assist the Marketing and Social Media team with a variety of graphic design tasks ranging from email, ads, print, and website design. You will be...</p>
                        </div>-->
                        <div class="profileFlex">
                            <ul>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>gender :</h4>
                                        <span>{{ $user->gender ? 'Male' : 'Female' }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>roll no :</h4>
                                        <span>{{ $user->roll_no }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>registration no :</h4>
                                        <span>{{ $user->registration_no }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>Date of Birth :</h4>
                                        <span>{{ $user->dob }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>married status :</h4>
                                        <span>{{ $user->married_status == 'm' ? 'Married' : 'Single' }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>program shift :</h4>
                                        <span>@if($user->program_shift == 'm') Morning @elseif($user->program_shift == 'd') Day @else Evening @endif</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>enrollment year :</h4>
                                        <span>{{ $user->enrollment_year }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>enrollment session :</h4>
                                        <span>{{ $user->enrollment_session }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>enrolled date :</h4>
                                        <span>{{ $user->enrolled_date }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="profileFlexCols">
                                        <h4>program status :</h4>
                                        <span>{{ $user->program_status }}</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
