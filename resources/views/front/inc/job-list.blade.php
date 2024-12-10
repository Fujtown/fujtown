<section>
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<ul class="job-list">
                        @foreach($jobs as $job)
						<li class="job-preview">
							<div class="content float-left">
								<h4 class="job-title">
									{{$job->job_title}}
								</h4>
								<h5 class="company">{{$job->company}}</h5>
                                <small>{{$job->location}}</small>
                                <p class="date">{{ $job->status }}</p>
							</div>
							<a href="{{route('job-details',['job'=>$job->url])}}" class="cus-btn btn-apply-cus float-sm-right float-xs-left">
								Apply
							</a>
						</li>
                        @endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>