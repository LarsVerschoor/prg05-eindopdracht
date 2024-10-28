<article class="post-preview">
    <div class="post-preview__head">
        <img src="{{Vite::asset('resources/images/icon_profile_white_default.svg')}}" alt="profile picture" class="post-preview__profile-picture">
        <div class="post-preview__username">{{$post->user->name}}</div>
        <a href="" class="post-preview__view-profile">View profile</a>
    </div>
    <div class="post-preview__image-container">
        <img src="{{route('posts.images.show', $post->id)}}" alt="The image attached to this post." class="post-preview__image">
    </div>
    <div class="post-preview__info-container">
        <div class="post-preview__title">{{$post->title}}</div>
        <a href="{{route('posts.show', $post->id)}}" class="post-preview__link">View post</a>
    </div>
    <div class="post-preview__footer">
        <div class="post-preview__comments-container">
            <a href="" class="post-preview__comments-link">
                <img src="{{Vite::asset('resources/images/icon_comment_white_default.svg')}}" alt="Comments" class="post-preview__comments-icon">
            </a>
            <div class="post-preview__comments-amount">12</div>
        </div>
        <div class="post-preview__likes-container">
            <button class="post-preview__likes-button">
                <img src="{{Vite::asset('resources/images/icon_like_red_liked.svg')}}" alt="Likes" class="post-preview__likes-icon">
            </button>
            <div class="post-preview__likes-amount">602</div>
        </div>
    </div>
</article>
