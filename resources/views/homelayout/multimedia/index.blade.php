@extends('welcome')

@section('title')
    {{ __('messages.multimedia') }}
@endsection
@section('css')
    <link rel="stylesheet" href="stylePresentation.css">

    <style>
        #gallery {
            line-height: 0;
            -webkit-column-count: 5;
            /* split it into 5 columns */
            -webkit-column-gap: 5px;
            /* give it a 5px gap between columns */
            -moz-column-count: 5;
            -moz-column-gap: 5px;
            column-count: 5;
            column-gap: 5px;
        }

        #gallery img {
            width: 100% !important;
            height: auto !important;
            margin-bottom: 5px;
            /* to match column gap */
            /* filter: grayscale(100%); */
            /* transition: filter 2s; */
            cursor: pointer;
            transition: transform 0.2s;
        }

        #gallery img:hover {
            filter: none !important;
            transform: scale(1.1);
        }

        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }

      

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white !important;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 1200px) {
            #gallery {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }

        @media (max-width: 1000px) {
            #gallery {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        @media (max-width: 800px) {
            #gallery {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 400px) {
            #gallery {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
        }

        .video-thumbnail {
            position: relative;
            width: 100%;
            margin-bottom: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .video-thumbnail:hover {
            transform: scale(1.1);
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">Multimédia</h2>
        <!-- Update the modal structure -->
        <!-- Update these styles -->
        <style>
            .modal-wrapper {
                position: relative;
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }
        
            .modal-content {
                width: 100%;
                height: 100vh;
                object-fit: contain;
                max-width: 100%;
                max-height: 100vh;
            }
        
            .modal-info {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(128, 128, 128, 0.8);
                color: white;
                padding: 20px;
                backdrop-filter: blur(5px);
            }

            .close {
                position: fixed;
                top: 20px;
                right: 35px;
                z-index: 1001;
            }
        </style>

        <!-- Move the close button outside the modal-wrapper -->
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()" style="color: black !important;">&times;</span>
            <div class="modal-wrapper">
                <img class="modal-content" id="modalImage" style="display: none;">
                <video class="modal-content" id="modalVideo" controls style="display: none; height: 80%;">
                    {{ __('messages.browser_does_not_support_video') }}
                </video>
                <div class="modal-info">
                    <h3 id="modalTitle"></h3>
                    <div id="modalDate"></div>
                    <p id="modalDescription"></p>
                </div>
            </div>
        </div>
        
        <!-- Update these styles -->
        <style>
            .modal-wrapper {
                position: relative;
                width: 100%;
                height: 100vh;
            }
        
            .modal-content {
                width: 100%;
                height: 100%;
                object-fit: contain;
                max-width: none;
                max-height: none;
            }
        
            .modal-info {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(128, 128, 128, 0.8);
                color: white;
                padding: 20px;
                backdrop-filter: blur(5px);
            }
        
            .modal-info h3 {
                margin: 0 0 10px 0;
                color: #fff;
                font-size: 1.5em;
            }
        
            #modalDate {
                color: #eee;
                font-size: 0.9em;
                margin-bottom: 10px;
            }
        
            #modalDescription {
                margin: 0;
                line-height: 1.4;
                color: #fff;
            }
        </style>
        
        <!-- Update the gallery section to include data attributes -->
        <div id="gallery">
            @foreach ($mediaItems as $item)
                @if ($item->type === 'image')
                    <img src="{{ s3Asset($item->path) }}" 
                        onclick="openModal(this, 'image')" 
                        alt="{{ $item->title }}"
                        data-title="{{ $item->title }}"
                        data-date="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                        data-description="{{ $item->description }}">
                @elseif($item->type === 'video')
                    <div class="video-thumbnail" 
                        onclick="openModal(this, 'video')" 
                        data-video="{{ s3Asset($item->path) }}"
                        data-title="{{ $item->title }}"
                        data-date="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                        data-description="{{ $item->description }}">
                        <video src="{{ s3Asset($item->path) }}" style="width: 100%;">
                            {{ __('messages.browser_does_not_support_video') }}
                        </video>
                        <div class="play-icon">▶</div>
                    </div>
                @endif
            @endforeach
        </div>
        
        <!-- Update the JavaScript -->
        <script>
            function openModal(element, type) {
                const modal = document.getElementById("myModal");
                const modalImg = document.getElementById("modalImage");
                const modalVideo = document.getElementById("modalVideo");
                
                // Update modal info
                const modalTitle =  document.getElementById("modalTitle").textContent = element.dataset.title;
                const modalDate = document.getElementById("modalDate").textContent = element.dataset.date;
                const modalDescription = document.getElementById("modalDescription").textContent = element.dataset.description;
        
                modal.style.display = "flex";
        
                if (type === 'image') {
                    modalImg.style.display = "block";
                    modalVideo.style.display = "none";
                    modalImg.src = element.src;
                } else if (type === 'video') {
                    modalImg.style.display = "none";
                    modalVideo.style.display = "block";
                    modalVideo.src = element.dataset.video;
                    modalVideo.play();
                }
            }
        </script>
    </div>

    <style>
        #gallery {
            line-height: 0;
            -webkit-column-count: 5;
            /* split it into 5 columns */
            -webkit-column-gap: 5px;
            /* give it a 5px gap between columns */
            -moz-column-count: 5;
            -moz-column-gap: 5px;
            column-count: 5;
            column-gap: 5px;
        }

        #gallery img {
            width: 100% !important;
            height: auto !important;
            margin-bottom: 5px;
            /* to match column gap */
            /* filter: grayscale(100%); */
            /* transition: filter 2s; */
            cursor: pointer;
            transition: transform 0.2s;
        }

        #gallery img:hover {
            filter: none !important;
            transform: scale(1.1);
        }

        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }

      

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white !important;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        @media (max-width: 1200px) {
            #gallery {
                -moz-column-count: 4;
                -webkit-column-count: 4;
                column-count: 4;
            }
        }

        @media (max-width: 1000px) {
            #gallery {
                -moz-column-count: 3;
                -webkit-column-count: 3;
                column-count: 3;
            }
        }

        @media (max-width: 800px) {
            #gallery {
                -moz-column-count: 2;
                -webkit-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 400px) {
            #gallery {
                -moz-column-count: 1;
                -webkit-column-count: 1;
                column-count: 1;
            }
        }

        .video-thumbnail {
            position: relative;
            width: 100%;
            margin-bottom: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .video-thumbnail:hover {
            transform: scale(1.1);
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>

    <script>
        function openModal(element, type) {
            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("modalImage");
            const modalVideo = document.getElementById("modalVideo");
            
            // Fix the info assignments by removing the const assignments
            document.getElementById("modalTitle").textContent = element.dataset.title;
            document.getElementById("modalDate").textContent = element.dataset.date;
            document.getElementById("modalDescription").textContent = element.dataset.description;

            modal.style.display = "flex";

            if (type === 'image') {
                modalImg.style.display = "block";
                modalVideo.style.display = "none";
                modalImg.src = element.src;
            } else if (type === 'video') {
                modalImg.style.display = "none";
                modalVideo.style.display = "block";
                modalVideo.src = element.dataset.video;
                modalVideo.play();
            }
        }

        function closeModal() {
            const modal = document.getElementById("myModal");
            const modalVideo = document.getElementById("modalVideo");
            modal.style.display = "none";
            modalVideo.pause();
        }
    </script>
@endsection
