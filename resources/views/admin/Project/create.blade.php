@extends('admin.layouts.master')
@section('title', 'Project Settings')
@section('content')



    <div class="content-body">
        <div class="container-fluid">
            {{-- <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Project</a></li>

					</ol>
                </div> --}}
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card" style="padding: 1%;">
                        <div class="card-header">
                            <h4 class="card-title">Project Setting:</h4>
                        </div>
                        <div class="card-body">

                            @include('admin.partials.validation_error_box')


                            <div class="kt-portlet__body">
                                <div class="kt-portlet__body">
                                    @if (!empty($data))
                                        <form class="kt-form kt-form--label-right" method="post"
                                            action="{{ url('admin/project/' . $data->id) }}" enctype="multipart/form-data">
                                            {{ method_field('PUT') }}
                                            @csrf
                                        @else
                                            <form class="kt-form kt-form--fit kt-form--label-right"
                                                action="{{ url('admin/project') }}" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                    @endif
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                            <div class="kt-form kt-form--label-right">
                                                <div class="kt-form__body">
                                                    <div class="kt-section kt-section--first">
                                                        <div class="kt-section__body">
                                                            <div class="row">
                                                                <label class="col-xl-3"></label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Project
                                                                    Name</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ isset($data->project_name) ? $data->project_name : old('project_name') }}"
                                                                        name="project_name">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                    <textarea class="form-control" name="description" rows="4" cols="50">{{ isset($data->description) ? $data->description : old('description') }}</textarea>

                                                                </div>
                                                            </div>
                                                            @php
                                                                $project_types = DB::table('project_types')->get();

                                                            @endphp

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Project
                                                                    Type</label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                    <select id="e1" name="project_type"
                                                                        class="form-control">
                                                                        @if (!empty($data))
                                                                            @php
                                                                                $project_typesing = DB::table('projects')
                                                                                    ->where('project_type', '=', $data->project_type)
                                                                                    ->first();
                                                                            @endphp

                                                                            @foreach ($project_types as $project_typess)
                                                                                <option value="{{ $project_typess->id }}"
                                                                                    @if ($project_typesing->project_type == $project_typess->id) selected @endif>
                                                                                    {{ $project_typess->project_type }}
                                                                                </option>
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">Select Project Types
                                                                            </option>
                                                                            @foreach ($project_types as $project_types)
                                                                                <option value="{{ $project_types->id }}">
                                                                                    {{ $project_types->project_type }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                        <!-- <input class="form-control" type="text" value="{{ isset($data->project_name) ? $data->project_name : old('project_name') }}" name="project_name"> -->

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Project
                                                                    Value</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <input class="form-control" type="text"
                                                                        value="{{ isset($data->project_value) ? $data->project_value : old('project_value') }}"
                                                                        name="project_value">
                                                                </div>
                                                            </div>

                                                            @php
                                                                $project_owners = DB::table('project_owners')->get();

                                                            @endphp

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Project
                                                                    Owners</label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                    <select id="e1" name="project_owners"
                                                                        class="form-control">
                                                                        @if (!empty($data))
                                                                            @php
                                                                                $project_ownerssing = DB::table('projects')
                                                                                    ->where('project_owner', '=', $data->project_owner)
                                                                                    ->first();
                                                                            @endphp
                                                                            @foreach ($project_owners as $project_ownerss)
                                                                                <option value="{{ $project_ownerss->id }}"
                                                                                    @if ($project_ownerssing->project_owner == $project_ownerss->id) selected @endif>
                                                                                    {{ $project_ownerss->name }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">Select Project Owners
                                                                            </option>
                                                                            @foreach ($project_owners as $project_owners)
                                                                                <option value="{{ $project_owners->id }}">
                                                                                    {{ $project_owners->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                        <!-- <input class="form-control" type="text" value="{{ isset($data->project_name) ? $data->project_name : '' }}" name="project_name"> -->

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $project_statuses = DB::table('project_statuses')->get();

                                                            @endphp
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Project
                                                                    Status</label>
                                                                <div class="col-lg-9 col-xl-6">

                                                                    <select id="e1" name="project_statuses"
                                                                        class="form-control">
                                                                        @if (!empty($data))
                                                                            @php
                                                                                $project_statusing = DB::table('projects')
                                                                                    ->where('project_status', '=', $data->project_status)
                                                                                    ->first();
                                                                            @endphp
                                                                            @foreach ($project_statuses as $project_statuses)
                                                                                <option value="{{ $project_statuses->id }}"
                                                                                    @if ($project_statusing->project_status == $project_statuses->id) selected @endif>
                                                                                    {{ $project_statuses->status }}
                                                                                </option>
                                                                            @endforeach
                                                                        @else
                                                                            <option value="">Select Status</option>
                                                                            @foreach ($project_statuses as $project_statuses)
                                                                                <option
                                                                                    value="{{ $project_statuses->id }}">
                                                                                    {{ $project_statuses->status }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                        <!-- <input class="form-control" type="text" value="{{ isset($data->project_name) ? $data->project_name : '' }}" name="project_name"> -->

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-7"></div>
                                                    <div class="col-lg-5">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="" class="btn btn-outline-danger"><a
                                                                href="{{ url('admin/project') }}">Cancel</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- end:: Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
