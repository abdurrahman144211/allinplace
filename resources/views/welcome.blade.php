@extends('layouts.app')

@section('title')
{{__('site.welcomeTitle')}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    {{__('site.welcomeTitle')}}
                </h1>
            </div>
            <div class="card">
                <table class="table card-table">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>% 24h</th>
                        <th>Market Cap</th>
                        <th>Circulating Supply</th>
                        <th>Volume 24H</th>
                        <th>CMGR/Month</th>
                        <th>Inflation</th>
                    </tr>
                    <tr>
                        <td>100</td>
                        <td></td>
                        <td>Iconomi</td>
                        <td>$2.26</td>
                        <td class="text-red">-11%</td>
                        <td class="text-right">$225,521,589</td>
                        <td>99,788,312 ICN</td>
                        <td class="text-right">$3,993,010</td>
                        <td>-3.30% / 7</td>
                        <td class="text-right">-0.19%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
