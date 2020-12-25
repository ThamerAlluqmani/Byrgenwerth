
@section('title', __("Home"))
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>استرخي</title>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fa/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;

        }
        a{
            text-decoration: none;

        }
        #intro {
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            position: relative;
        }

        #text {
            position: absolute;
            bottom: 0px;
            width: 100%;
            background-color: #00000080;
            height: 54px;
            color: white;
            text-align: center;
            font-size: 27px;
        }

        #features i {
            font-size: 40px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="container shadow-lg p-0">
        <div id="intro">
            <div id="text" class="d-flex align-items-center">
                <h2 class="text-center w-100">السر يكمن في الدماء!</h2>
            </div>
        </div>

        <div id="features" class="mt-5">
            <p class="px-3 mb-5">
                بيرغنويرث، هي كلية قديمة خصصت لدراسة العظماء وعالمهم، مجموعة من طلاب هذه الكلية اكتشفوا معابد قديمة يحتويها نوع من أنواع الدماء القديمة لاحقاً عرفت بدماء العظماء
                ادى ظهور هذه الدماء لحدوث فوضى وتمرد على ماستر ويليام، وهو أحد كبار والشخصيات المعروفة داخل هذه المدرسة           </p>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="fa fa-home fa-lg mb-2" aria-hidden="true"></i>
                    <a class="nav-link text-info" href="{{route('articles.index')}}">{{__("Home")}}</a>
                    <p>{{__("Browse all articles")}}</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-user fa-lg mb-2" aria-hidden="true"></i>
                    <a class="nav-link text-info" href="{{route('register')}}">{{_("regitster")}}</a>
                    <p>{{__("Create your first new article")}}</p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-file-text fa-lg mb-2" aria-hidden="true"></i>
                    <a class="nav-link text-info" href="{{route('contact')}}">{{_("Contact us")}}</a>
                    <p>{{__("أخبرنا ماتريد التحدث بشأنه")}}</p>
                </div>

            </div>
            <link href="{{ asset('css/style2.css') }}" rel="stylesheet">


            <div class="card mt-5">



                <div class="card-header">
                    <h3 class="text-muted text-center">{{__("Latest articles")}}</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        @forelse($articles as $article)

                            @include('articles._article-template')

                        @empty
                            {{__("No articles yet")}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>


