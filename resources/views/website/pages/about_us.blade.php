@extends('website.layouts.master')
@section('title')
    About Us | Sapporo Medical Journal
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="_card mb-3 text-justify">
                    <h5 class="_card-header rounded-0 font-size-22" style="_background-color: #413c69; color: #fff;">About Journal</h5>
                    <div class="_card-body">
                      <p><strong>Sapporo Medical Journal</strong> is a journal covering the technologies/fields/categories related to Medicine (miscellaneous) (Q4). It is published by Sapporo Ika Daigaku. The overall rank of <strong>Sapporo Medical Journal</strong> is 30622. According to SCImago Journal Rank (SJR), this journal is ranked 0.101. SCImago Journal Rank is an indicator, which measures the scientific influence of journals. It considers the number of citations received by a journal and the importance of the journals from where these citations come. SJR acts as an alternative to the Journal Impact Factor (or an average number of citations received in last 2 years). This journal has an h-index of 3. The best quartile for this journal is Q4.</p>

                      <p>The ISSN of <strong>Sapporo Medical Journal</strong> is 0036472X. An International Standard Serial Number (ISSN) is a unique code of 8 digits. It is used for the recognition of journals, newspapers, periodicals, and magazines in all kind of forms, be it print-media or electronic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 bg-light p-2">
                @include('website.partials.sidebar_web')              
            </div>
        </div>
    </div>
@endsection
