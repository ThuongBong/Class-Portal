@extends('layouts.app')
@section('title', $assignment->title)
@section('page-header', $assignment->title)
@section('content')
    <div class="col-xs-12 col-md-12">
        @include('pages.teacher.session-data')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Answer list
                </h4>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 5%">STT</th>
                            <th scope="col">User</th>
                            <th scope="col">Mark</th>
                            <th scope="col">Submission time</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $key => $result)
                            <tr>
                                <td style="vertical-align: middle">
                                    {{ $key + 1 }}
                                </td>
                                <td style="vertical-align: middle">
                                    {{ isset($result->user) ? $result->user->first_name . ' '. $result->user->last_name : '' }}
                                </td>
                                <td style="vertical-align: middle" class="result_mark_{{ $result->id }} {{ $result->status !== 0 ? '': 'red-color'}}">
                                    {{ !($result->mark) ? "__/100" :  $result->mark . '/100' }}
                                </td>
                                <td style="vertical-align: middle" class="{{ $result->status !== 0 ? '': 'red-color'}}">
                                    {{ $result->status !== 0 ? $result->updated_at : "__" }}
                                </td>
                                <td style="vertical-align: middle;" class="{{ $result->status !== 0 ? 'text-green-v4': 'red-color'}}">
                                    {{ $result->status !== 0 ? 'Submitted' : "Haven't submitted" }}
                                </td>
                                <td style="vertical-align: middle; width: 5%;">
                                    <a class="btn btn-success btn-sm {{ $result->status !== 0 ? '' : "hidden" }}" href="{{ route('get.detail.answer', $result->id) }}">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="padding-top: 50px">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="detail_Answer_1">

            </div>
        </div>
    </div>--}}
@endsection
