<x-app-layout>
	<div class="flex justify-center mt-6">
		<div class="w-8/12 bg-white p-6 rounded-lg">
			
			<form action="{{ route('posts.store') }}" method="post">
				@csrf

				<div class="mb-4">
					<label for="body" class="sr-only">{{ __('Body') }}</label>
					<textarea
						name="body"
						id="body"
						cols="30"
						rows="4"
						class="bg-gray-100 w-full p-4 rounded-lg 
						@error('body')
						border-red-500
						@else
						border-1
						@enderror
						" placeholder="{{ __('Post something') }}"></textarea>

					@error('body')
						<div class="text-red-500 mt-2 text-sm">
							{{ __($message) }}
						</div>
					@enderror
				</div>

				<div>
					<button
						type="submit"
						class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
						{{ __('Post') }}
					</button>
				</div>
			</form>

			<div class="my-5">
				@if ($posts->count())
					@foreach ($posts as $post)
						<div class="mb-4">
							<a href="" class="font-bold">
								{{ __($post->user->name) }}
							</a>
							<span class="text-sm text-gray-600">
								{{ $post->created_at->diffForHumans() }}
							</span>

							<p class="mb-2">
								{{ __($post->body) }}
							</p>

							<div class="flex items-center">
								@auth
									@if (!$post->likedBy(auth()->user()))
										<form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
											@csrf
											<button type="submit" class="text-blue-500">Like</button>
										</form>
									@else
										<form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
											@csrf
											@method('DELETE')
											<button type="submit" class="text-blue-500">Unlike</button>
										</form>
									@endif
								@endauth

								{{ $post->likes->count() }} {{ __(Str::plural('like', $post->likes()->count())) }}

							</div>
						</div>
					@endforeach

					{{ $posts->links() }}
				@else
				<p>There are no posts</p>
				@endif
			</div>

		</div>
	</div>
</x-app-layout>