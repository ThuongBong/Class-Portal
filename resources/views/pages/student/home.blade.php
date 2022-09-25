@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container wrap-list-classes">
        @if (count(Auth::user()->classes()->get()) > 0)
            <div class="edn-tabs">
                <div id="tab-home-page" class="group-head-tab-control">
                    <div class="session-group ui-tabs-panel ui-widget-content" id="course-member" role="tabpanel" aria-hidden="false" style="" aria-labelledby="session-group-tab">
                        <section class="course-section">
                            <div class="wrap-slider-content">
                                <div class="wrap-course-section">
                                    <div class="list-course row">
                                        @foreach ($classes as $class)
                                            <article class="course-item col-md-4 col-sm-6 col-lg-3 publish" style="margin: 0 0 30px; padding: 0 15px;">
                                                <div class="wrap-course-item">
                                                    <div class="course-infor" style="padding: 20px">
                                                        <h3 class="course-title mg-b-15 fs-18">
                                                            <a href="{{ url('class/' . $class->id) }}" title="{{ $class->name }}" style="font-size: 16px">
                                                                {{$class->name}}
                                                            </a>
                                                        </h3>
                                                        <ul class="bottom-course-sum none-list mg-0 fs-14 mg-b-15">
                                                            <li>
                                                                <i class="la la-info-circle"></i>
                                                                <span title="{{ $class->title }}">Title: {{ $class->title }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="la la-life-bouy"></i>
                                                                <span title="{{ $class->room }}">Room: {{ $class->room }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="la la-user-circle"></i>
                                                                <span title="{{--{{$lecturer->email}}--}}">
                                                                    Lecturers:
                                                                    {{($class->usersIsTeacher->first()->email)}}
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <i class="las la-id-card"></i>
                                                                <span title="Number of students: ">Number of students:
                                                                {{--{{$class->lecturers->filter(function ($item) { return $item->role === 'student';})->map(function ($item) {return $item->fullname;})->join(' - ')}}--}}
                                                                    {{$class->usersIsStudent->count()}}
                                                                </span>

                                                            </li>
                                                        </ul>
                                                        <a class="view-detail text-decoration-none fs-14 mg-b-5" href="{{ url('class/' . $class->id) }}" title="Go to course">
                                                            Go to class <i class="las la-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        @else
            <div class="align-right">
                <img src="{{ asset('uploads/landing/arrow.png') }}" style="height: 5rem;"/>
                <br>
                <p style="font-size: 13px; color: #6a6969; letter-spacing: 0.05rem; line-height: 1.25rem; font-weight: 450; text-align: right">
                    Don’t see your classes? <br>
                    Try another account...
                </p>
            </div>
            <div class="align-center" style="font-size: 13px;">
                <img src="{{asset('uploads/landing/backgr-homepage.png')}}" style="height: 17rem"/>
                <p style="color: #6a6969; letter-spacing: 0.05rem; font-weight: 450; margin-top: 15px">
                    Join the class using the code or link provided
                    <br> by the teacher to get started
                </p>
                <div class="join">
                    <button class="btn btn-primary join-class2" data-toggle="modal" data-target="#userJoinCode">
                        Join class by code
                    </button>
                </div>
            </div>

        @endif
    </div>

    <!--form link-->
{{--
    <div class="modal fade" id="userJoinLink" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Join class by link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('join.class', $classCode) }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Link to the classroom
                            </label>
                            <p>Ask your teacher for a link to the class, then enter the link here.</p>
                            <input type="text" class="form-control link-join-class" name="classCode"
                                   placeholder="Enter your link here">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="Accept" class="btn btn-primary join-by-link">Join Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
--}}
@endsection



