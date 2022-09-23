@extends('layouts.app')

@section('title', 'Answer Details')

@section('page-header', isset($result->user) ? 'Result: ' . $result->user->first_name . ' ' . $result->user->last_name : '')

@section('content')
    <div class="col-xs-12 col-md-12">
        @include('pages.teacher.session-data')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title fs-20">
                    Assignment title : {{ isset($result->assignment) ? $result->assignment->title : '' }}
                </h3>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-12">
                    <div>
                        <h4 style="margin: 20px 0">Student's answer: </h4>

                        @if ( !empty($result->source) || !empty($result->description) || (!empty($result->source) && !empty($result->description)) )
                            <div class="wrap-main-activity">
                                <div class="wrap-entry-lesson-content">
                                    <b class="mg-b-8">Source: </b>
                                    <div class="wrap-activity-content">
                                        <p>
                                            <a href="{!! asset('uploads/assignments/' . $result->source) !!}" target="_blank">
                                                {{ $result->source }}
                                            </a>
                                        </p>
                                    </div>

                                    <b>Description: </b>
                                    <span>{!! empty($result->description) ? '' : $result->description !!}</span>

                                    <span style="float: right">{!! empty($result->updated_at) ? '' : $result->updated_at !!}</span>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                No results have been submitted yet. Please check back again later!
                            </div>
                        @endif
                    </div>

                    <hr>

                    <div style="">
                        <div class="row">
                            <div class="col-md-10">
                                <label>Mark: </label>
                                <input type="number" class="form-control" id="mark_assignment" name="mark" placeholder="Mark" value="{{ isset($result) && !empty($result->mark) ? $result->mark : '' }}">
                            </div>
                            <div class="col-md-10" style="margin: 15px 0">
                                <label>Comments: </label>
                                <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="Teacher comments">{{ isset($result) && !empty($result->comments) ? $result->comments : '' }}</textarea>
                            </div>
                            <div class="col-md-10">
                                <button type="button" class="btn btn-success btn-save-mark" style="width: 8rem" url="{{ route('update.mark.answer', $result->id) }}">Save</button>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('teacher.assignment.answers', $result->assignment)}}">
                                    <button type="button" class="btn btn-primary" style="width: 120px">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Back List
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
