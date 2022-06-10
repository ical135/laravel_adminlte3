@extends('layouts.app')

@section('additionalStyle')
    @include('layouts.plugins.datatables')
    @include('layouts.plugins.select2')
    @include('layouts.plugins.sweetalert2')
@endsection

@php
    $master_var = 'user_table';
    $data['idBox'] = 'idBox'.$master_var;
    $data['idBoxContent'] = 'idBoxContent'.$master_var;
    $data['idBoxLoader'] = 'idBoxLoader'.$master_var;
    $data['idBoxOverlay'] = 'idBoxOverlay'.$master_var;
    $data['idBtnAdd'] = 'idBtnAdd'.$master_var;

    $data['idModal'] = 'idModal'.$master_var;
    $data['idModalContent'] = 'idModalContent'.$master_var;

    /**Additional Variable */
    $data['class_link'] = $class_link;
@endphp

@section('content')
<div class="row" id="{{ $data['idBox'] }}">
    <div class="col-12">
      <!-- Default box -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">{{ ucwords(str_replace('_', ' ', $master_var)) }}</h3>          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" id="{{ $data['idBtnAdd'] }}" data-toggle="tooltip" title="Tambah Data">
              <i class="fas fa-plus-circle"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button> --}}
          </div>
        </div>
        <div class="card-body">
            <div id="<?php echo $data['idBoxLoader']; ?>" align="middle">
              <i class="fas fa-spinner fa-pulse fa-2x" style="color:#31708f;"></i>
              {{-- <i class="fa fa-spinner fa-pulse fa-2x" style="color:#31708f;"></i> --}}
            </div>
            <div id="{{ $data['idBoxContent'] }}"></div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      <div class="overlay" id="{{ $data['idBoxOverlay'] }}" style="display: none;">
        <i class="fas fa-spinner fa-pulse" style="color:#31708f;"></i>
      </div>
    </div>
</div>

<div class="modal fade" id="{{ $data['idModal'] }}">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extra Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="{{ $data['idModalContent'] }}"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection

@section('scriptJS')
  @include('page/'.$class_link.'/index_js', $data)
@append

