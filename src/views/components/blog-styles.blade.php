<style>
    .section-blog
    {
        min-height: 600px;
        padding-bottom: 60px;
        padding-top: 60px;
    }

    .section-blog .blog-header
    {
        max-width: 100%;
        width: 100%;
    }

    .section-blog .blog-header .inner-header
    {
        float: left;
        width: 100%;
        position: relative;
        padding-top: 30px;
        padding-bottom: 25px;
        z-index: 0;
    }

    .section-blog .blog-header .inner-header ul
    {
        text-align: center;
        margin-bottom: 0px;
        background-color: #9a4750;
        padding: 15px;
        margin-top: 10px;
    }

    .section-blog .blog-header .inner-header ul a
    {
        color: #fff;
        display: inline-block;
    }

    .section-blog .blog-header .inner-header ul a::after
    {
        content: '';
        width: 0px;
        height: 1px;
        display: block;
        background: #fff;
        transition: 300ms;
    }

    .section-blog .blog-header .inner-header ul a:hover::after,
    .section-blog .blog-header .inner-header ul a.active::after
    {
        width: 100%;
    }

    .section-blog ul.posts
    {
        list-style: none;
        padding-left: 0px;
    }

    .section-blog ul.posts li
    {
        margin-bottom: 40px;
    }

    .section-blog ul.posts .post-img img
    {
        -webkit-transition: .2s all;
        transition: .2s all;
    }

    .section-blog ul.posts .post-img:hover img
    {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }

    .section-blog ul.posts .post-date
    {
        position: absolute;
        bottom: -3px;
        left: 19px;
        background-color: #040958;
        color: #fff;
        padding: 5px;
        font-size: 11px;
        border: 1px solid #fff;
    }

    .section-blog ul.posts .post-title
    {
        font-size: 18px;
        color: #000;
        font-weight: 700;
        margin-top: 5px;
    }

    .section-blog ul.posts .post-title a
    {
        color: #000;
        -webkit-transition: .2s all;
        transition: .2s all;
    }

    .section-blog ul.posts .post-title a:hover
    {
        color: #040958;
    }

    .section-blog ul.posts .post-summary
    {
        font-size: 14px;
        color: #858585;
        line-height: 1.6;
    }

    .section-blog ul.posts .time-read
    {
        color: #040958;
        font-weight: 300;
        font-size: 13px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .section-blog .posts-navigation ul
    {
        margin-top: 0px !important;
    }

    .section-blog .posts-sidebar
    {
        background-color: #f4f4f4;
        padding: 15px;
    }

    .section-blog .posts-sidebar ul.posts li
    {
        margin-bottom: 18px;
    }

    .section-blog article
    {
        padding-right: 1.875rem;
        padding-left: 1.875rem;
        position: relative;
        width: 100%;
    }

    .section-blog article .headline
    {
        margin-top: 40px;
    }

    .section-blog article .headline h1
    {
        color: #424851;
        text-align: center;
        font-weight: bold;
    }

    .section-blog article .summary
    {
        font-size: 16px;
        margin-top: 30px;
        color: #424851;
        line-height: 1.6;
    }

    .section-blog article .meta
    {
        text-align: center;
        font-size: 14px;
    }

    .section-blog .block-categories
    {
        background-color: #f2f3f3;
        padding: 36px 21px 36px;
    }

    .section-blog .block-categories h4
    {
        color: #424851;
        font-size: 20px;
        font-weight: bold;
    }

    .section-blog .block-categories ul
    {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 30px;
    }

    .section-blog .block-categories ul li
    {
        display: block;
        overflow: hidden;
        color: rgba(66,72,81,0.8);
        margin-bottom: 12px;
        position: relative;
    }

    .section-blog .block-categories ul li a
    {
        padding-right: 10px;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        position: relative;
        z-index: 1;
        background-color: #f2f3f3;
        -webkit-transition: all .15s ease-in-out;
        -o-transition: all .15s ease-in-out;
        transition: all .15s ease-in-out;
        -webkit-font-smoothing: antialiased;
    }

    .section-blog .block-categories ul li .dots::before
    {
        color: #424851;
        content: ". . . . . . . . . . . . . . . . . . . . " ". . . . . . . . . . . . . . . . . . . . ";
        white-space: nowrap;
        display: block;
        width: 100%;
        height: 2px;
        opacity: 1;
        position: absolute;
        z-index: 0;
        line-height: 1;
        top: 0;
        display: block;
    }

    .section-blog .block-categories ul li .count
    {
        background-color: #f2f3f3;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        padding-left: 10px;
        position: absolute;
        right: 0;
        z-index: 1;
        font-weight: bold;
    }

    .section-blog .block-social
    {
        background-color: #435a6f;
        padding: 36px 21px 36px;
    }

    .section-blog .block-social h4
    {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }

    .section-blog .block-social p
    {
        color: rgba(255,255,255,.8);
        font-size: 13px;
        margin-top: 20px;
    }

    .section-blog .block-social ul
    {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 30px;
    }

    .section-blog .block-social ul
    {
        list-style-type: none;
    }

    .section-blog .block-social ul li a
    {
        display: block;
        margin-bottom: 10px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        background-color: #323b44;
        border: 1px solid #eceef2;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .section-blog .block-social ul li a:hover
    {
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
    }

    .section-blog .block-social ul li a i
    {
        color: #b4c7d8;
    }

    .section-blog .block-posts-featured
    {
        background-color: #040958;
        padding: 36px 21px 36px;
    }

    .section-blog .block-posts-featured h4
    {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }

    .section-blog .block-posts-featured p
    {
        color: rgba(255,255,255,.8);
        font-size: 13px;
        margin-top: 20px;
    }

    .section-blog .block-posts-featured ul
    {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 30px;
    }

    .section-blog .block-posts-featured ul
    {
        list-style-type: none;
    }

    .section-blog .block-posts-featured ul li
    {
        margin-bottom: 15px;
    }

    .section-blog .block-posts-featured ul li a
    {
        font-size: 13px;
        color: #fff;
        margin-bottom: 15px;
    }

    .section-blog .block-posts-featured ul li a:hover
    {
        color: rgba(255,255,255,.7);
    }

    .section-blog .block-posts-most-viewed
    {
        background-color: #435a6f;
        padding: 36px 21px 36px;
    }

    .section-blog .block-posts-most-viewed h4
    {
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }

    .section-blog .block-posts-most-viewed p
    {
        color: rgba(255,255,255,.8);
        font-size: 13px;
        margin-top: 20px;
    }

    .section-blog .block-posts-most-viewed ul
    {
        margin: 0;
        padding: 0;
        list-style: none;
        margin-top: 30px;
    }

    .section-blog .block-posts-most-viewed ul
    {
        list-style-type: none;
    }

    .section-blog .block-posts-most-viewed ul li
    {
        margin-bottom: 15px;
    }

    .section-blog .block-posts-most-viewed ul li a
    {
        font-size: 13px;
        color: #fff;
        margin-bottom: 15px;
    }

    .section-blog .block-posts-most-viewed ul li a:hover
    {
        color: rgba(255,255,255,.7);
    }

    .section-blog article .text *
    {
        line-height: 2;
        color: #000;
        font-family: 'Raleway', sans-serif !important;
    }

    .section-blog article .text p,
    .section-blog article .text div,
    .section-blog article .text span,
    .section-blog article .text
    {
        margin-bottom: 10px;
        line-height: 1.5;
        font-size: 15px;
        color: #797979;
    }

    .section-blog article .text ol, ul
    {
        margin-bottom: 0px;
    }

    .section-blog article .text ol li, .section-blog article .text ul li
    {
        font-size: 15px;
        color: #797979 !important;
    }

    .section-blog article .text img
    {
        padding-left: 10px;
        padding-right: 10px;
        max-width: 100%;
        height: auto;
    }
</style>
