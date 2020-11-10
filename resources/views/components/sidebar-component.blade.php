<div class="accordion mt-4" id="accordionExample">
    @php $i=1; @endphp
    @foreach ($categories as $category)
        <div class="card table-bordered border-dark myFont">
            <div class="card-header bg-light" id="headingOne">
                <h2 class="mb-0">
                    <button class="nh_btn text-decoration-none text-dark btn btn-link btn-block text-left" type="button"
                        data-toggle="collapse" data-target="#collapseOne{{ $i }}" aria-expanded="true"
                        aria-controls="collapseOne{{ $i }}">
                        {{ $category->name }}
                    </button>
                </h2>
            </div>
            {{-- @if($loop->first) {{'show'}} @endif --}}
            <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  @foreach($category->subcategories as $subcategory)
                  <a class="btn btn-link subcategory" href="{{route('itemsBySubCategory',$subcategory->id)}}" data-id="{{$subcategory->id}}">{{$subcategory->name}}</a>
                  @endforeach
                </div>
            </div>
        </div>
        @php $i++; @endphp
    @endforeach
</div>
