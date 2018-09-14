<div id="share-buttons">
    <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>

    <a href="https://twitter.com/share?url={{ Request::url() }}&amp;text=Check%20Out%20This%20Recipe%20From%20Vegaroo&amp;hashtags=#vegaroo" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

    <a href="mailto:?Subject=Recipe From Vegaroo&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20
        {{ Request::url() }}">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>

    <a href="http://reddit.com/submit?url={{ Request::url() }}" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a>
</div>