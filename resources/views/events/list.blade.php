
<style>
    .symbol.symbol-65px>img{
        width: 385px;
        height: 400px;
    }
</style>
@forelse($events as $event)
    <div class="col-md-6 col-xxl-4">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-center flex-column py-9 px-5">
                <!--begin::Avatar-->
                <a href="/detail/{{ $event['slug'] }}">
                    <div class="symbol symbol-65px mb-5">
                        <img src="{{ asset('storage') .'/'.  $event->image}}" alt="image">                
                    </div>
                </a>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="/detail/{{ $event['slug'] }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $event['title'] }}</a>
                <!--end::Name-->
                <!--begin::Position-->
                {{-- <div class="fw-semibold text-gray-400 mb-6">Art Director at Novica Co.</div> --}}
                <!--end::Position-->
                <!--begin::Info-->
                
                <!--end::Info-->
                <!--begin::Follow-->
                <button class="btn btn-sm btn-light-primary" data-kt-follow-btn="true">
                    <!--begin::Indicator label-->
                    <a href="/detail/{{ $event['slug'] }}">
                    <span class="indicator-label">{{ $event['text_button'] }}</span>
                    </a>
                    <!--end::Indicator label-->
                </button>
                <!--end::Follow-->
            </div>
            <!--begin::Card body-->
        </div>
        <!--begin::Card-->
    </div>
@empty
    data kosong
@endforelse