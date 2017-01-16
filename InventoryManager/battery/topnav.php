<!DOCTYPE html>
<html>
<head>
    <style>
        ul#top {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li.topn {
            float: left;
            border-right:1px solid #bbb;
        }

        li.topn:last-child {
            border-right: none;
        }

        li.topn a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li.topn a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<ul id="top">
    <li class="topn"><a class="active" href="#home">Home</a></li>
    <li class="topn"><a href="#news">News</a></li>
    <li class="topn"><a href="#contact">Contact</a></li>
</ul>

</body>
</html>
