@extends('layouts.level3')
@section('title','Laporan - Asetqu')
@section('content')
      <div class="col-sm-10 content4">
        <div class="col-sm-12">
          <div class="panel panel-danger">
            <div class="panel-heading">Rekapitulasi Barang Inventaris <span class="badge">2017</span></div>
            <div class="panel-body">
              <div class="table-responsive report">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Laporan</th>
                      <th>Download (files)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reports as $report)
                      <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->description}}</td>
                        <td>
                          <a href="/laporan/{{$report->id}}/pdf" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-file"></span>PDF</a>
                          <a href="/laporan/{{$report->id}}/excel" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-save-file"></span>EXCEL</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
