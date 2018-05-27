@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.crm-customers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.first-name')</th>
                            <td field-key='first_name'>{{ $crm_customer->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.last-name')</th>
                            <td field-key='last_name'>{{ $crm_customer->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.crm-status')</th>
                            <td field-key='crm_status'>{{ $crm_customer->crm_status->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.email')</th>
                            <td field-key='email'>{{ $crm_customer->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.phone')</th>
                            <td field-key='phone'>{{ $crm_customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.address')</th>
                            <td field-key='address'>{{ $crm_customer->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.skype')</th>
                            <td field-key='skype'>{{ $crm_customer->skype }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.website')</th>
                            <td field-key='website'>{{ $crm_customer->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.crm-customers.fields.description')</th>
                            <td field-key='description'>{!! $crm_customer->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#crm_notes" aria-controls="crm_notes" role="tab" data-toggle="tab">Notes</a></li>
<li role="presentation" class=""><a href="#crm_documents" aria-controls="crm_documents" role="tab" data-toggle="tab">Documents</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="crm_notes">
<table class="table table-bordered table-striped {{ count($crm_notes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-notes.fields.customer')</th>
                        <th>@lang('quickadmin.crm-notes.fields.note')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_notes) > 0)
            @foreach ($crm_notes as $crm_note)
                <tr data-entry-id="{{ $crm_note->id }}">
                    <td field-key='customer'>{{ $crm_note->customer->first_name or '' }}</td>
                                <td field-key='note'>{!! $crm_note->note !!}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_notes.show',[$crm_note->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_notes.edit',[$crm_note->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_notes.destroy', $crm_note->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="crm_documents">
<table class="table table-bordered table-striped {{ count($crm_documents) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-documents.fields.customer')</th>
                        <th>@lang('quickadmin.crm-documents.fields.name')</th>
                        <th>@lang('quickadmin.crm-documents.fields.description')</th>
                        <th>@lang('quickadmin.crm-documents.fields.file')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_documents) > 0)
            @foreach ($crm_documents as $crm_document)
                <tr data-entry-id="{{ $crm_document->id }}">
                    <td field-key='customer'>{{ $crm_document->customer->first_name or '' }}</td>
                                <td field-key='name'>{{ $crm_document->name }}</td>
                                <td field-key='description'>{!! $crm_document->description !!}</td>
                                <td field-key='file'>@if($crm_document->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $crm_document->file) }}" target="_blank">Download file</a>@endif</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_documents.show',[$crm_document->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_documents.edit',[$crm_document->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_documents.destroy', $crm_document->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.crm_customers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
