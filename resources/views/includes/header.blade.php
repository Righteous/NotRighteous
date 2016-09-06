<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand active" href="/">Not Righteous</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ set_active(['/']) }}"><a href="/">Home</a></li>
                <li class="{{ set_active(['exif']) }}"><a href="/exif">Exif</a></li>
                <li class="{{ set_active(['infosec']) }}"><a href="/infosec">InfoSec</a></li>
            </ul>
        </div>
    </div>
</div>