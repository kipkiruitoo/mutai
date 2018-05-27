@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.crm-documents.title')</h3>
    @can('crm_document_create')
    <p>
        <a href="{{ route('admin.crm_documents.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($crm_documents) > 0 ? 'datatable' : '' }} @can('crm_document_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('crm_document_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('crm_document_delete')
                                    <td></td>
                                @endcan

                                <td field-key='customer'>{{ $crm_document->customer->first_name or '' }}</td>
                                <td field-key='name'>{{ $crm_document->name }}</td>
                                <td field-key='description'>{!! $crm_document->description !!}</td>
                                <td field-key='file'>@if($crm_document->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $crm_document->file) }}" target="_blank">Download file</a>@endif</td>
                                                                <td>
                                    @can('crm_document_view')
                                    <a href="{{ route('admin.crm_documents.show',[$crm_document->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('crm_document_edit')
                                    <a href="{{ route('admin.crm_documents.edit',[$crm_document->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('crm_document_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.crm_documents.destroy', $crm_document->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('crm_document_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.crm_documents.mass_destroy') }}';
        @endcan

    </script>
@endsection