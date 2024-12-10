<div class="row">
@foreach($blogs as $blog)
<div class="col-lg-6 col-md-6 mb-30 item-article customer-stories wow animate__animated animate__fadeIn" data-wow-delay=".0s">
<div class="card-blog-grid card-blog-grid-3 hover-up">
                  <div class="card-image"><a href="{{route('blog-details',$blog->url)}}"><img src="{{asset('storage/'.$blog->image)}}" alt="iori"></a>
                    <label class="lbl-border">{{$blog->category->blog_cat_name}}</label>
                  </div>
                  <div class="card-info"><a href="{{route('blog-details',$blog->url)}}">
                      <h4 class="color-brand-1">{{$blog->title}}</h4></a>
                    <div class="mb-25 mt-10"><span class="font-xs color-grey-500">{{ $blog->formatted_date }}</span>
                    
                  </div>
                     </div>
                </div>
</div>

        @endforeach    

         <!-- Pagination Links -->
         <div class="mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($blogs->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $blogs->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
            @endif

            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($blogs->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
</div>