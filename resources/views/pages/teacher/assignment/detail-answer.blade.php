
@extends('layouts.app')
@section('title', isset($result->user) ? $result->user->first_name . ' ' . $result->user->last_name : '')
@section('page-header', isset($result->user) ? $result->user->first_name . ' ' . $result->user->last_name : '')
@section('content')
    <div class="col-xs-12 col-md-12">
        @include('pages.teacher.session-data')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    {{ isset($result->user) ? $result->user->first_name . ' ' . $result->user->last_name : '' }}
                </h4>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-12">
                    <div>
                        <h5>Assignment title : {{ isset($result->assignment) ? $result->assignment->title : '' }}</h5>
                    </div>
                    <div>
                        <h5>Answer</h5>
                        {!! $result->description !!}
                    </div>

                    <div class="footer" style="border-top: 1px solid #dee2e6; padding: 15px">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="mark_assignment" name="mark" placeholder="Mark" value="{{ isset($result) && !empty($result->mark) ? $result->mark : '' }}">
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="comments" id="comments" cols="30" rows="10" placeholder="Comments">{{ isset($result) && !empty($result->comments) ? $result->comments : '' }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success btn-save-mark" style="padding: 8px 10px !important;" url="{{ route('update.mark.answer', $result->id) }}"> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection