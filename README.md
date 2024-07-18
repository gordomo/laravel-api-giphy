# Laravel API with Giphy Integration

This project is a Laravel-based API that integrates with the Giphy API. It includes OAuth2 authentication using Laravel Passport, persistent storage for user interactions, and unit tests.

## Features
- User registration and login with OAuth2 authentication
- Integration with Giphy API for searching GIFs
- Storing user favorite GIFs
- Unit tests and feature tests
- Adheres to SOLID principles

## Requirements
- Docker
- Docker Compose

## Setup
1. Clone the repository:
2. Check docker configurations inside Dockerfile and docker-compose.yml - set ports and folders as you want
3. create a "mysql" folder in the root level for persistanse
4. open a terminal and run "docker compose build" and then "docker compose up -d"
5. inside php docker container run:
   - composer install
   - php artisan passport:install
   - php artisan migrate

## API Endpoints

### Register
- **URL**: `/api/register`
- **Method**: `POST`
- **Parameters**:
  ```json
  {
      "name": "Test User",
      "email": "testuser@example.com",
      "password": "password123",
      "c_password": "password123"
  }
- **Response**:
  ```json
  {
      "success": true,
      "data": {
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNjgwODE3M2MwMWNiN2UxYmMzYWJkOGM0NDBjYTQ0ODFlZjg5ZTk1ODRhMGI3YmQ3MzY3ZjQ1MTFmYmMyZGMyMDIyYjRlZGJkNzAzOTZkZmMiLCJpYXQiOjE3MjEzMzY3OTMuMTg0MzI1LCJuYmYiOjE3MjEzMzY3OTMuMTg0MzI3LCJleHAiOjE3MjEzMzg1OTMuMTc3MzY4LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.Iq9gejxl4DW8V1scA_8IQTUx-3j1UjpWN0Q1dH41cX7y3_QcJ7stfcGXE7FpdVfaT_jCV28riY8qihrIRwxFS1bCMXjjYErJ8MA-XhLTdhI5z8MCmmFkY9lyvbcPln3hM_ZxG6WFtPaj0tfTi6n53aqIfkxcKRciJPGiDjeJEBRMk542aV3xVP321gIZ6730QRVwZGhoBc296aC7tkN4zn1io5vvL41KNViHL9Fe-Ofdmhf5YE_LJOsaQcd_W5ih-QcicoYONu16TnA4Sy7hkCYxTse8VEwK1lzrOT6sG_1Bxnxvakuax56q1chm1quwvXiXpb6ppSRz4Enp8N-CSk7_CUMWDruCQgrmgmmB33D5OVykkD7IZH3vHTJLHEuQRk3oO2QOi_5FYzLTBKa9RyRLh0tRwl2lMbWyhTvJpVqygIW8teUDKV1pkPyjaxbPtIp28MrWa-i4kbpA3e5k7pdHGlK6x5ArnjBZHdQurObCb7ZdtVZZ1NIbBpQVlkIgIezlzK9ACu1zSADcuLfZQFMhdhFmXjE-xJTzMcM_j5GjbQ5pwLXZghXTGrn6-u8_di7l5ptn8a-XGpp8kUPVlG2F9eoWi8AWEU4eKzh1vFJHO4VYnAaLN5nyrzU5621whWhLIT8ggf0exgyxdekAjh3iYNmBIsbMdcvZj38pkfQ",
          "user": {
              "email": "testuser@example.com",
              "name": "Test User",
              "updated_at": "2024-07-18T21:06:33.000000Z",
              "created_at": "2024-07-18T21:06:33.000000Z",
              "id": 2
          }
      },
      "message": "",
      "code": 200
  }
    

### Login
- **URL**:  `/api/login`
- **Method**: `POST`
- **Parameters**:
  ```json
  {
      "email": "testuser@example.com",
      "password": "password123"
  }
- **Response**:
  ```json
  {
      "success": true,
      "data": {
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNjgwODE3M2MwMWNiN2UxYmMzYWJkOGM0NDBjYTQ0ODFlZjg5ZTk1ODRhMGI3YmQ3MzY3ZjQ1MTFmYmMyZGMyMDIyYjRlZGJkNzAzOTZkZmMiLCJpYXQiOjE3MjEzMzY3OTMuMTg0MzI1LCJuYmYiOjE3MjEzMzY3OTMuMTg0MzI3LCJleHAiOjE3MjEzMzg1OTMuMTc3MzY4LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.Iq9gejxl4DW8V1scA_8IQTUx-3j1UjpWN0Q1dH41cX7y3_QcJ7stfcGXE7FpdVfaT_jCV28riY8qihrIRwxFS1bCMXjjYErJ8MA-XhLTdhI5z8MCmmFkY9lyvbcPln3hM_ZxG6WFtPaj0tfTi6n53aqIfkxcKRciJPGiDjeJEBRMk542aV3xVP321gIZ6730QRVwZGhoBc296aC7tkN4zn1io5vvL41KNViHL9Fe-Ofdmhf5YE_LJOsaQcd_W5ih-QcicoYONu16TnA4Sy7hkCYxTse8VEwK1lzrOT6sG_1Bxnxvakuax56q1chm1quwvXiXpb6ppSRz4Enp8N-CSk7_CUMWDruCQgrmgmmB33D5OVykkD7IZH3vHTJLHEuQRk3oO2QOi_5FYzLTBKa9RyRLh0tRwl2lMbWyhTvJpVqygIW8teUDKV1pkPyjaxbPtIp28MrWa-i4kbpA3e5k7pdHGlK6x5ArnjBZHdQurObCb7ZdtVZZ1NIbBpQVlkIgIezlzK9ACu1zSADcuLfZQFMhdhFmXjE-xJTzMcM_j5GjbQ5pwLXZghXTGrn6-u8_di7l5ptn8a-XGpp8kUPVlG2F9eoWi8AWEU4eKzh1vFJHO4VYnAaLN5nyrzU5621whWhLIT8ggf0exgyxdekAjh3iYNmBIsbMdcvZj38pkfQ",
          "user": {
              "email": "testuser@example.com",
              "name": "Test User",
              "updated_at": "2024-07-18T21:06:33.000000Z",
              "created_at": "2024-07-18T21:06:33.000000Z",
              "id": 2
          }
      },
      "message": "",
      "code": 200
  }
    

### Search
- **URL**:  `/api/search-gifs`
- **Method**: `GET`
- **Autentication**: `Bearer Token`
- **Parameters**:
  ```json
  {
      "query": "apples",
  }
- **Response**:
  ```json
  {
    "success": true,
    "data": {
        "data": [
            {
                "type": "gif",
                "id": "OQkjelDb4JcuP3rEBw",
                "url": "https://giphy.com/gifs/Crystalhillsorganics-kelowna-crystal-hills-organics-OQkjelDb4JcuP3rEBw",
                "slug": "Crystalhillsorganics-kelowna-crystal-hills-organics-OQkjelDb4JcuP3rEBw",
                "bitly_gif_url": "https://gph.is/g/4L8OlvL",
                "bitly_url": "https://gph.is/g/4L8OlvL",
                "embed_url": "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
                "username": "Crystalhillsorganics",
                "source": "",
                "title": "For You Peach GIF by Crystal Hills Organics",
                "rating": "g",
                "content_url": "",
                "source_tld": "",
                "source_post_url": "",
                "is_sticker": 0,
                "import_datetime": "2022-05-22 07:03:25",
                "trending_datetime": "0000-00-00 00:00:00",
                "images": {
                    "original": {
                        "height": "480",
                        "width": "270",
                        "size": "3409669",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g",
                        "mp4_size": "490463",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g",
                        "webp_size": "994172",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.webp&ct=g",
                        "frames": "53",
                        "hash": "7afa37cb85953737a7b4c23640a513ad"
                    },
                    "downsized": {
                        "height": "384",
                        "width": "216",
                        "size": "1752925",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized.gif&ct=g"
                    },
                    "downsized_large": {
                        "height": "480",
                        "width": "270",
                        "size": "3409669",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_medium": {
                        "height": "480",
                        "width": "270",
                        "size": "3409669",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_small": {
                        "height": "400",
                        "width": "225",
                        "mp4_size": "190758",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized-small.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized-small.mp4&ct=g"
                    },
                    "downsized_still": {
                        "height": "384",
                        "width": "216",
                        "size": "38522",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized_s.gif&ct=g"
                    },
                    "fixed_height": {
                        "height": "200",
                        "width": "112",
                        "size": "830827",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.gif&ct=g",
                        "mp4_size": "131396",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.mp4&ct=g",
                        "webp_size": "275524",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.webp&ct=g"
                    },
                    "fixed_height_downsampled": {
                        "height": "200",
                        "width": "112",
                        "size": "87117",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.gif&ct=g",
                        "webp_size": "43424",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.webp&ct=g"
                    },
                    "fixed_height_small": {
                        "height": "100",
                        "width": "56",
                        "size": "205252",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.gif&ct=g",
                        "mp4_size": "50307",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.mp4&ct=g",
                        "webp_size": "84892",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.webp&ct=g"
                    },
                    "fixed_height_small_still": {
                        "height": "100",
                        "width": "56",
                        "size": "7268",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100_s.gif&ct=g"
                    },
                    "fixed_height_still": {
                        "height": "200",
                        "width": "112",
                        "size": "20301",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_s.gif&ct=g"
                    },
                    "fixed_width": {
                        "height": "356",
                        "width": "200",
                        "size": "1635322",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.gif&ct=g",
                        "mp4_size": "304272",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.mp4&ct=g",
                        "webp_size": "523240",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.webp&ct=g"
                    },
                    "fixed_width_downsampled": {
                        "height": "356",
                        "width": "200",
                        "size": "177883",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.gif&ct=g",
                        "webp_size": "117984",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.webp&ct=g"
                    },
                    "fixed_width_small": {
                        "height": "178",
                        "width": "100",
                        "size": "649435",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.gif&ct=g",
                        "mp4_size": "115215",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.mp4&ct=g",
                        "webp_size": "193500",
                        "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "fixed_width_small_still": {
                        "height": "178",
                        "width": "100",
                        "size": "16896",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w_s.gif&ct=g"
                    },
                    "fixed_width_still": {
                        "height": "356",
                        "width": "200",
                        "size": "52046",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_s.gif&ct=g"
                    },
                    "looping": {
                        "mp4_size": "2201069",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-loop.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-loop.mp4&ct=g"
                    },
                    "original_still": {
                        "height": "480",
                        "width": "270",
                        "size": "87462",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "original_mp4": {
                        "height": "480",
                        "width": "270",
                        "mp4_size": "490463",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g"
                    },
                    "preview": {
                        "height": "150",
                        "width": "84",
                        "mp4_size": "49278",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.mp4&ct=g"
                    },
                    "preview_gif": {
                        "height": "100",
                        "width": "56",
                        "size": "37306",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.gif&ct=g"
                    },
                    "preview_webp": {
                        "height": "100",
                        "width": "56",
                        "size": "26028",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.webp&ct=g"
                    },
                    "hd": {
                        "height": "1080",
                        "width": "607",
                        "mp4_size": "2017528",
                        "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-hd.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-hd.mp4&ct=g"
                    },
                    "480w_still": {
                        "height": "853",
                        "width": "480",
                        "size": "3409669",
                        "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/480w_s.jpg?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=480w_s.jpg&ct=g"
                    }
                },
                "user": {
                    "avatar_url": "https://media4.giphy.com/avatars/Crystalhillsorganics/4sBLawo0LsJH.jpeg",
                    "banner_image": "",
                    "banner_url": "",
                    "profile_url": "https://giphy.com/Crystalhillsorganics/",
                    "username": "Crystalhillsorganics",
                    "display_name": "Crystal Hills Organics",
                    "description": "Exquisite flowers, high vibe crystals, and healing herbs are blended to create the Crystal Hills product line. We have a farm and vineyard in the beautiful Okanagan Valley, in British Columbia, Canada.",
                    "instagram_url": "https://instagram.com/crystalhillsorganics",
                    "website_url": "http://www.crystalhills.com/",
                    "is_verified": false
                },
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPU9Ra2plbERiNEpjdVAzckVCdyZjdD1n",
                "analytics": {
                    "onload": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPU9Ra2plbERiNEpjdVAzckVCdyZjdD1n&action_type=SEEN"
                    },
                    "onclick": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPU9Ra2plbERiNEpjdVAzckVCdyZjdD1n&action_type=CLICK"
                    },
                    "onsent": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPU9Ra2plbERiNEpjdVAzckVCdyZjdD1n&action_type=SENT"
                    }
                },
                "alt_text": ""
            },
            {
                "type": "gif",
                "id": "l0ErEUzFXtOomc2B2",
                "url": "https://giphy.com/gifs/music-video-112-peaches-l0ErEUzFXtOomc2B2",
                "slug": "music-video-112-peaches-l0ErEUzFXtOomc2B2",
                "bitly_gif_url": "http://gph.is/2hKoE53",
                "bitly_url": "http://gph.is/2hKoE53",
                "embed_url": "https://giphy.com/embed/l0ErEUzFXtOomc2B2",
                "username": "",
                "source": "https://www.youtube.com/watch?v=wl2NCXzg1FQ&feature=player_embedded",
                "title": "peaches and cream GIF",
                "rating": "g",
                "content_url": "",
                "source_tld": "www.youtube.com",
                "source_post_url": "https://www.youtube.com/watch?v=wl2NCXzg1FQ&feature=player_embedded",
                "is_sticker": 0,
                "import_datetime": "2016-12-13 20:01:46",
                "trending_datetime": "0000-00-00 00:00:00",
                "images": {
                    "original": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g",
                        "mp4_size": "60141",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g",
                        "webp_size": "171054",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.webp&ct=g",
                        "frames": "7",
                        "hash": "5f3084e56c9aaef26c7ca2fc236dd2b3"
                    },
                    "downsized": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_large": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_medium": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_small": {
                        "height": "360",
                        "width": "480",
                        "mp4_size": "60141",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy-downsized-small.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized-small.mp4&ct=g"
                    },
                    "downsized_still": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "fixed_height": {
                        "height": "200",
                        "width": "266",
                        "size": "213893",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.gif&ct=g",
                        "mp4_size": "27477",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.mp4&ct=g",
                        "webp_size": "70466",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.webp&ct=g"
                    },
                    "fixed_height_downsampled": {
                        "height": "200",
                        "width": "266",
                        "size": "185019",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.gif&ct=g",
                        "webp_size": "60786",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.webp&ct=g"
                    },
                    "fixed_height_small": {
                        "height": "100",
                        "width": "133",
                        "size": "61228",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.gif&ct=g",
                        "mp4_size": "11277",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.mp4&ct=g",
                        "webp_size": "24854",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.webp&ct=g"
                    },
                    "fixed_height_small_still": {
                        "height": "100",
                        "width": "133",
                        "size": "10513",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100_s.gif&ct=g"
                    },
                    "fixed_height_still": {
                        "height": "200",
                        "width": "266",
                        "size": "34041",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_s.gif&ct=g"
                    },
                    "fixed_width": {
                        "height": "150",
                        "width": "200",
                        "size": "128837",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.gif&ct=g",
                        "mp4_size": "18946",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.mp4&ct=g",
                        "webp_size": "46202",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.webp&ct=g"
                    },
                    "fixed_width_downsampled": {
                        "height": "150",
                        "width": "200",
                        "size": "111902",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.gif&ct=g",
                        "webp_size": "39740",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.webp&ct=g"
                    },
                    "fixed_width_small": {
                        "height": "75",
                        "width": "100",
                        "size": "38307",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.gif&ct=g",
                        "mp4_size": "8101",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.mp4&ct=g",
                        "webp_size": "16808",
                        "webp": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "fixed_width_small_still": {
                        "height": "75",
                        "width": "100",
                        "size": "6892",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/100w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w_s.gif&ct=g"
                    },
                    "fixed_width_still": {
                        "height": "150",
                        "width": "200",
                        "size": "21014",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/200w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_s.gif&ct=g"
                    },
                    "looping": {
                        "mp4_size": "1808944",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy-loop.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-loop.mp4&ct=g"
                    },
                    "original_still": {
                        "height": "360",
                        "width": "480",
                        "size": "89826",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "original_mp4": {
                        "height": "360",
                        "width": "480",
                        "mp4_size": "60141",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g"
                    },
                    "preview": {
                        "height": "324",
                        "width": "432",
                        "mp4_size": "48069",
                        "mp4": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy-preview.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.mp4&ct=g"
                    },
                    "preview_gif": {
                        "height": "126",
                        "width": "168",
                        "size": "49012",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy-preview.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.gif&ct=g"
                    },
                    "preview_webp": {
                        "height": "211",
                        "width": "281",
                        "size": "49884",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/giphy-preview.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.webp&ct=g"
                    },
                    "480w_still": {
                        "height": "360",
                        "width": "480",
                        "size": "591480",
                        "url": "https://media0.giphy.com/media/l0ErEUzFXtOomc2B2/480w_s.jpg?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=480w_s.jpg&ct=g"
                    }
                },
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPWwwRXJFVXpGWHRPb21jMkIyJmN0PWc",
                "analytics": {
                    "onload": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPWwwRXJFVXpGWHRPb21jMkIyJmN0PWc&action_type=SEEN"
                    },
                    "onclick": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPWwwRXJFVXpGWHRPb21jMkIyJmN0PWc&action_type=CLICK"
                    },
                    "onsent": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPWwwRXJFVXpGWHRPb21jMkIyJmN0PWc&action_type=SENT"
                    }
                },
                "alt_text": ""
            },
            {
                "type": "gif",
                "id": "xA2PkYKckVEJ2",
                "url": "https://giphy.com/gifs/mtv-tbt-peach-princess-xA2PkYKckVEJ2",
                "slug": "mtv-tbt-peach-princess-xA2PkYKckVEJ2",
                "bitly_gif_url": "http://gph.is/1SJGfYH",
                "bitly_url": "http://gph.is/1SJGfYH",
                "embed_url": "https://giphy.com/embed/xA2PkYKckVEJ2",
                "username": "mtv",
                "source": "http://mtv.tumblr.com/post/132949101801/me-all-the-haters",
                "title": "Princess Peach 90S GIF by mtv",
                "rating": "g",
                "content_url": "",
                "source_tld": "mtv.tumblr.com",
                "source_post_url": "http://mtv.tumblr.com/post/132949101801/me-all-the-haters",
                "is_sticker": 0,
                "import_datetime": "2016-04-27 10:16:22",
                "trending_datetime": "0000-00-00 00:00:00",
                "images": {
                    "original": {
                        "height": "400",
                        "width": "540",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g",
                        "mp4_size": "339108",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g",
                        "webp_size": "335528",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.webp&ct=g",
                        "frames": "22",
                        "hash": "d65efea2db4c37a8c4eea92b856858b8"
                    },
                    "downsized": {
                        "height": "400",
                        "width": "540",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_large": {
                        "height": "400",
                        "width": "540",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_medium": {
                        "height": "400",
                        "width": "540",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_small": {
                        "height": "212",
                        "width": "285",
                        "mp4_size": "192406",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy-downsized-small.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized-small.mp4&ct=g"
                    },
                    "downsized_still": {
                        "height": "400",
                        "width": "540",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "fixed_height": {
                        "height": "200",
                        "width": "270",
                        "size": "248834",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.gif&ct=g",
                        "mp4_size": "128254",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.mp4&ct=g",
                        "webp_size": "91590",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.webp&ct=g"
                    },
                    "fixed_height_downsampled": {
                        "height": "200",
                        "width": "270",
                        "size": "57571",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.gif&ct=g",
                        "webp_size": "32482",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.webp&ct=g"
                    },
                    "fixed_height_small": {
                        "height": "100",
                        "width": "136",
                        "size": "87485",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.gif&ct=g",
                        "mp4_size": "41978",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.mp4&ct=g",
                        "webp_size": "29246",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.webp&ct=g"
                    },
                    "fixed_height_small_still": {
                        "height": "100",
                        "width": "136",
                        "size": "3422",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100_s.gif&ct=g"
                    },
                    "fixed_height_still": {
                        "height": "200",
                        "width": "270",
                        "size": "8192",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_s.gif&ct=g"
                    },
                    "fixed_width": {
                        "height": "148",
                        "width": "200",
                        "size": "179178",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.gif&ct=g",
                        "mp4_size": "74662",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.mp4&ct=g",
                        "webp_size": "49914",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.webp&ct=g"
                    },
                    "fixed_width_downsampled": {
                        "height": "148",
                        "width": "200",
                        "size": "37874",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.gif&ct=g",
                        "webp_size": "20694",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.webp&ct=g"
                    },
                    "fixed_width_small": {
                        "height": "76",
                        "width": "100",
                        "size": "57681",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.gif&ct=g",
                        "mp4_size": "28483",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.mp4&ct=g",
                        "webp_size": "19928",
                        "webp": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "fixed_width_small_still": {
                        "height": "76",
                        "width": "100",
                        "size": "2532",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w_s.gif&ct=g"
                    },
                    "fixed_width_still": {
                        "height": "148",
                        "width": "200",
                        "size": "5522",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/200w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_s.gif&ct=g"
                    },
                    "looping": {
                        "mp4_size": "2424330",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy-loop.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-loop.mp4&ct=g"
                    },
                    "original_still": {
                        "height": "400",
                        "width": "540",
                        "size": "21087",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "original_mp4": {
                        "height": "356",
                        "width": "480",
                        "mp4_size": "339108",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g"
                    },
                    "preview": {
                        "height": "90",
                        "width": "118",
                        "mp4_size": "49688",
                        "mp4": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy-preview.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.mp4&ct=g"
                    },
                    "preview_gif": {
                        "height": "76",
                        "width": "100",
                        "size": "19586",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/giphy-preview.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.gif&ct=g"
                    },
                    "preview_webp": {
                        "height": "76",
                        "width": "100",
                        "size": "19928",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "480w_still": {
                        "height": "356",
                        "width": "480",
                        "size": "1146222",
                        "url": "https://media2.giphy.com/media/xA2PkYKckVEJ2/480w_s.jpg?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=480w_s.jpg&ct=g"
                    }
                },
                "user": {
                    "avatar_url": "https://media4.giphy.com/avatars/mtv/7RKYpJY4lQ5J.png",
                    "banner_image": "https://media4.giphy.com/headers/mtv/VtLgHCVphWWZ.gif",
                    "banner_url": "https://media4.giphy.com/headers/mtv/VtLgHCVphWWZ.gif",
                    "profile_url": "https://giphy.com/mtv/",
                    "username": "mtv",
                    "display_name": "mtv",
                    "description": "MTV, USA",
                    "instagram_url": "",
                    "website_url": "http://www.mtv.com",
                    "is_verified": true
                },
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPXhBMlBrWUtja1ZFSjImY3Q9Zw",
                "analytics": {
                    "onload": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPXhBMlBrWUtja1ZFSjImY3Q9Zw&action_type=SEEN"
                    },
                    "onclick": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPXhBMlBrWUtja1ZFSjImY3Q9Zw&action_type=CLICK"
                    },
                    "onsent": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPXhBMlBrWUtja1ZFSjImY3Q9Zw&action_type=SENT"
                    }
                },
                "alt_text": ""
            },
            {
                "type": "gif",
                "id": "Ads5bXtYhhHLG",
                "url": "https://giphy.com/gifs/foxadhd-artists-on-tumblr-violet-bruce-Ads5bXtYhhHLG",
                "slug": "foxadhd-artists-on-tumblr-violet-bruce-Ads5bXtYhhHLG",
                "bitly_gif_url": "http://gph.is/1wrwa6q",
                "bitly_url": "http://gph.is/1wrwa6q",
                "embed_url": "https://giphy.com/embed/Ads5bXtYhhHLG",
                "username": "foxadhd",
                "source": "www.foxadhd.com",
                "title": "Video Games Space GIF by Animation Domination High-Def",
                "rating": "pg-13",
                "content_url": "http://kotaku.com/princess-peachs-underwear-is-protected-from-your-gaze-1634782027",
                "source_tld": "",
                "source_post_url": "www.foxadhd.com",
                "is_sticker": 0,
                "import_datetime": "2014-09-17 20:01:34",
                "trending_datetime": "1970-01-01 00:00:00",
                "images": {
                    "original": {
                        "height": "500",
                        "width": "500",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g",
                        "mp4_size": "53832",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g",
                        "webp_size": "111014",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.webp&ct=g",
                        "frames": "33",
                        "hash": "3b038b3bc9a20ebb5b37086493c4add2"
                    },
                    "downsized": {
                        "height": "500",
                        "width": "500",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_large": {
                        "height": "500",
                        "width": "500",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_medium": {
                        "height": "500",
                        "width": "500",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_small": {
                        "height": "500",
                        "width": "500",
                        "mp4_size": "55326",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy-downsized-small.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized-small.mp4&ct=g"
                    },
                    "downsized_still": {
                        "height": "500",
                        "width": "500",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "fixed_height": {
                        "height": "200",
                        "width": "200",
                        "size": "25385",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.gif&ct=g",
                        "mp4_size": "16847",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.mp4&ct=g",
                        "webp_size": "42236",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.webp&ct=g"
                    },
                    "fixed_height_downsampled": {
                        "height": "200",
                        "width": "200",
                        "size": "10619",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.gif&ct=g",
                        "webp_size": "12844",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.webp&ct=g"
                    },
                    "fixed_height_small": {
                        "height": "100",
                        "width": "100",
                        "size": "12406",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.gif&ct=g",
                        "mp4_size": "7700",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.mp4&ct=g",
                        "webp_size": "22510",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.webp&ct=g"
                    },
                    "fixed_height_small_still": {
                        "height": "100",
                        "width": "100",
                        "size": "2566",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100_s.gif&ct=g"
                    },
                    "fixed_height_still": {
                        "height": "200",
                        "width": "200",
                        "size": "5329",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_s.gif&ct=g"
                    },
                    "fixed_width": {
                        "height": "200",
                        "width": "200",
                        "size": "25385",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.gif&ct=g",
                        "mp4_size": "16847",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.mp4&ct=g",
                        "webp_size": "42236",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.webp&ct=g"
                    },
                    "fixed_width_downsampled": {
                        "height": "200",
                        "width": "200",
                        "size": "10619",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.gif&ct=g",
                        "webp_size": "12844",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.webp&ct=g"
                    },
                    "fixed_width_small": {
                        "height": "100",
                        "width": "100",
                        "size": "12406",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.gif&ct=g",
                        "mp4_size": "7700",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.mp4&ct=g",
                        "webp_size": "22510",
                        "webp": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "fixed_width_small_still": {
                        "height": "100",
                        "width": "100",
                        "size": "2566",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/100w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w_s.gif&ct=g"
                    },
                    "fixed_width_still": {
                        "height": "200",
                        "width": "200",
                        "size": "5329",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/200w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_s.gif&ct=g"
                    },
                    "looping": {
                        "mp4_size": "263875",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy-loop.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-loop.mp4&ct=g"
                    },
                    "original_still": {
                        "height": "500",
                        "width": "500",
                        "size": "14778",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "original_mp4": {
                        "height": "480",
                        "width": "480",
                        "mp4_size": "53832",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g"
                    },
                    "preview": {
                        "height": "500",
                        "width": "500",
                        "mp4_size": "31843",
                        "mp4": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy-preview.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.mp4&ct=g"
                    },
                    "preview_gif": {
                        "height": "500",
                        "width": "500",
                        "size": "28995",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy-preview.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.gif&ct=g"
                    },
                    "preview_webp": {
                        "height": "500",
                        "width": "500",
                        "size": "43902",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/giphy-preview.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.webp&ct=g"
                    },
                    "480w_still": {
                        "height": "480",
                        "width": "480",
                        "size": "60177",
                        "url": "https://media4.giphy.com/media/Ads5bXtYhhHLG/480w_s.jpg?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=480w_s.jpg&ct=g"
                    }
                },
                "user": {
                    "avatar_url": "https://media4.giphy.com/avatars/foxadhd/FIpJVXV5aO80.gif",
                    "banner_image": "https://media4.giphy.com/avatars/foxadhd/GifrKcAjH8gg.jpg",
                    "banner_url": "https://media4.giphy.com/avatars/foxadhd/GifrKcAjH8gg.jpg",
                    "profile_url": "https://giphy.com/foxadhd/",
                    "username": "foxadhd",
                    "display_name": "Animation Domination High-Def",
                    "description": "Saturdays @11p/10c on Fox",
                    "instagram_url": "",
                    "website_url": "http://www.foxadhd.com",
                    "is_verified": true
                },
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPUFkczViWHRZaGhITEcmY3Q9Zw",
                "analytics": {
                    "onload": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPUFkczViWHRZaGhITEcmY3Q9Zw&action_type=SEEN"
                    },
                    "onclick": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPUFkczViWHRZaGhITEcmY3Q9Zw&action_type=CLICK"
                    },
                    "onsent": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPUFkczViWHRZaGhITEcmY3Q9Zw&action_type=SENT"
                    }
                },
                "alt_text": ""
            },
            {
                "type": "gif",
                "id": "VmOQZ60UfMOmAHY7PR",
                "url": "https://giphy.com/gifs/ThisIsMashed-animation-animated-mashed-VmOQZ60UfMOmAHY7PR",
                "slug": "ThisIsMashed-animation-animated-mashed-VmOQZ60UfMOmAHY7PR",
                "bitly_gif_url": "https://gph.is/g/E0B7Kgo",
                "bitly_url": "https://gph.is/g/E0B7Kgo",
                "embed_url": "https://giphy.com/embed/VmOQZ60UfMOmAHY7PR",
                "username": "ThisIsMashed",
                "source": "https://youtu.be/Zr8mhckE0mI",
                "title": "Stinks Princess Peach GIF by Mashed",
                "rating": "pg",
                "content_url": "",
                "source_tld": "youtu.be",
                "source_post_url": "https://youtu.be/Zr8mhckE0mI",
                "is_sticker": 0,
                "import_datetime": "2022-05-27 19:12:20",
                "trending_datetime": "0000-00-00 00:00:00",
                "images": {
                    "original": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g",
                        "mp4_size": "30991",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g",
                        "webp_size": "35604",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.webp&ct=g",
                        "frames": "18",
                        "hash": "aa4f84598d998067b38fee2b66c4d903"
                    },
                    "downsized": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_large": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_medium": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                    },
                    "downsized_small": {
                        "height": "270",
                        "width": "480",
                        "mp4_size": "30991",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-downsized-small.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-downsized-small.mp4&ct=g"
                    },
                    "downsized_still": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "fixed_height": {
                        "height": "200",
                        "width": "356",
                        "size": "44873",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.gif&ct=g",
                        "mp4_size": "21808",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.mp4&ct=g",
                        "webp_size": "39618",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200.webp&ct=g"
                    },
                    "fixed_height_downsampled": {
                        "height": "200",
                        "width": "356",
                        "size": "34712",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.gif&ct=g",
                        "webp_size": "38092",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_d.webp&ct=g"
                    },
                    "fixed_height_small": {
                        "height": "100",
                        "width": "178",
                        "size": "18500",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.gif&ct=g",
                        "mp4_size": "10087",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.mp4&ct=g",
                        "webp_size": "21922",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100.webp&ct=g"
                    },
                    "fixed_height_small_still": {
                        "height": "100",
                        "width": "178",
                        "size": "7987",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100_s.gif&ct=g"
                    },
                    "fixed_height_still": {
                        "height": "200",
                        "width": "356",
                        "size": "19758",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200_s.gif&ct=g"
                    },
                    "fixed_width": {
                        "height": "113",
                        "width": "200",
                        "size": "20675",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.gif&ct=g",
                        "mp4_size": "11216",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.mp4&ct=g",
                        "webp_size": "18832",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w.webp&ct=g"
                    },
                    "fixed_width_downsampled": {
                        "height": "113",
                        "width": "200",
                        "size": "14379",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w_d.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.gif&ct=g",
                        "webp_size": "22792",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w_d.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_d.webp&ct=g"
                    },
                    "fixed_width_small": {
                        "height": "57",
                        "width": "100",
                        "size": "9350",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100w.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.gif&ct=g",
                        "mp4_size": "5215",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100w.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.mp4&ct=g",
                        "webp_size": "4846",
                        "webp": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100w.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w.webp&ct=g"
                    },
                    "fixed_width_small_still": {
                        "height": "57",
                        "width": "100",
                        "size": "3600",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/100w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=100w_s.gif&ct=g"
                    },
                    "fixed_width_still": {
                        "height": "113",
                        "width": "200",
                        "size": "10018",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/200w_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=200w_s.gif&ct=g"
                    },
                    "looping": {
                        "mp4_size": "358747",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-loop.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-loop.mp4&ct=g"
                    },
                    "original_still": {
                        "height": "270",
                        "width": "480",
                        "size": "33925",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy_s.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy_s.gif&ct=g"
                    },
                    "original_mp4": {
                        "height": "270",
                        "width": "480",
                        "mp4_size": "30991",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy.mp4&ct=g"
                    },
                    "preview": {
                        "height": "270",
                        "width": "480",
                        "mp4_size": "30991",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-preview.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.mp4&ct=g"
                    },
                    "preview_gif": {
                        "height": "270",
                        "width": "480",
                        "size": "47333",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-preview.gif?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.gif&ct=g"
                    },
                    "preview_webp": {
                        "height": "244",
                        "width": "434",
                        "size": "48258",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-preview.webp?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-preview.webp&ct=g"
                    },
                    "hd": {
                        "height": "1080",
                        "width": "1920",
                        "mp4_size": "152414",
                        "mp4": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/giphy-hd.mp4?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=giphy-hd.mp4&ct=g"
                    },
                    "480w_still": {
                        "height": "270",
                        "width": "480",
                        "size": "65077",
                        "url": "https://media2.giphy.com/media/VmOQZ60UfMOmAHY7PR/480w_s.jpg?cid=8e96a8430i9scq5vjueh32be5pupczcclnb61anrc1b16n3g&ep=v1_gifs_search&rid=480w_s.jpg&ct=g"
                    }
                },
                "user": {
                    "avatar_url": "https://media4.giphy.com/avatars/ThisIsMashed/E7a5xlFOXwBA.gif",
                    "banner_image": "https://media4.giphy.com/channel_assets/ThisIsMashed/4jD0k9dv5Fx1.png",
                    "banner_url": "https://media4.giphy.com/channel_assets/ThisIsMashed/4jD0k9dv5Fx1.png",
                    "profile_url": "https://giphy.com/ThisIsMashed/",
                    "username": "ThisIsMashed",
                    "display_name": "Mashed",
                    "description": "The stuff you love, but different… \r\n\r\nComedy. Gaming. Animation.\r\n\r\nNew cartoons every week on YouTube!",
                    "instagram_url": "https://instagram.com/ThisIsMashed",
                    "website_url": "https://www.youtube.com/mashed",
                    "is_verified": true
                },
                "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPVZtT1FaNjBVZk1PbUFIWTdQUiZjdD1n",
                "analytics": {
                    "onload": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPVZtT1FaNjBVZk1PbUFIWTdQUiZjdD1n&action_type=SEEN"
                    },
                    "onclick": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPVZtT1FaNjBVZk1PbUFIWTdQUiZjdD1n&action_type=CLICK"
                    },
                    "onsent": {
                        "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfU0VBUkNIJmNpZD04ZTk2YTg0MzBpOXNjcTV2anVlaDMyYmU1cHVwY3pjY2xuYjYxYW5yYzFiMTZuM2cmZ2lmX2lkPVZtT1FaNjBVZk1PbUFIWTdQUiZjdD1n&action_type=SENT"
                    }
                },
                "alt_text": ""
            }
        ],
        "meta": {
            "status": 200,
            "msg": "OK",
            "response_id": "0i9scq5vjueh32be5pupczcclnb61anrc1b16n3g"
        },
        "pagination": {
            "total_count": 658,
            "count": 5,
            "offset": 0
        }
    },
    "message": "ok",
    "code": 200
}

### Search by id
- **URL**:  `/api/search-by-id`
- **Method**: `GET`
- **Autentication**: `Bearer Token`
- **Parameters**:
  ```json
  {
      "gifId": "OQkjelDb4JcuP3rEBw",
  }

- **Response**:
  ```json
  {
    "success": true,
    "data": {
        "data": {
            "type": "gif",
            "id": "OQkjelDb4JcuP3rEBw",
            "url": "https://giphy.com/gifs/Crystalhillsorganics-kelowna-crystal-hills-organics-OQkjelDb4JcuP3rEBw",
            "slug": "Crystalhillsorganics-kelowna-crystal-hills-organics-OQkjelDb4JcuP3rEBw",
            "bitly_gif_url": "https://gph.is/g/4L8OlvL",
            "bitly_url": "https://gph.is/g/4L8OlvL",
            "embed_url": "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
            "username": "Crystalhillsorganics",
            "source": "",
            "title": "For You Peach GIF by Crystal Hills Organics",
            "rating": "g",
            "content_url": "",
            "source_tld": "",
            "source_post_url": "",
            "is_sticker": 0,
            "import_datetime": "2022-05-22 07:03:25",
            "trending_datetime": "0000-00-00 00:00:00",
            "images": {
                "original": {
                    "height": "480",
                    "width": "270",
                    "size": "3409669",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.gif&ct=g",
                    "mp4_size": "490463",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.mp4&ct=g",
                    "webp_size": "994172",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.webp&ct=g",
                    "frames": "53",
                    "hash": "7afa37cb85953737a7b4c23640a513ad"
                },
                "downsized": {
                    "height": "384",
                    "width": "216",
                    "size": "1752925",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-downsized.gif&ct=g"
                },
                "downsized_large": {
                    "height": "480",
                    "width": "270",
                    "size": "3409669",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.gif&ct=g"
                },
                "downsized_medium": {
                    "height": "480",
                    "width": "270",
                    "size": "3409669",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.gif&ct=g"
                },
                "downsized_small": {
                    "height": "400",
                    "width": "225",
                    "mp4_size": "190758",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized-small.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-downsized-small.mp4&ct=g"
                },
                "downsized_still": {
                    "height": "384",
                    "width": "216",
                    "size": "38522",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-downsized_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-downsized_s.gif&ct=g"
                },
                "fixed_height": {
                    "height": "200",
                    "width": "112",
                    "size": "830827",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200.gif&ct=g",
                    "mp4_size": "131396",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200.mp4&ct=g",
                    "webp_size": "275524",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200.webp&ct=g"
                },
                "fixed_height_downsampled": {
                    "height": "200",
                    "width": "112",
                    "size": "87117",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_d.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200_d.gif&ct=g",
                    "webp_size": "43424",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_d.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200_d.webp&ct=g"
                },
                "fixed_height_small": {
                    "height": "100",
                    "width": "56",
                    "size": "205252",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100.gif&ct=g",
                    "mp4_size": "50307",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100.mp4&ct=g",
                    "webp_size": "84892",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100.webp&ct=g"
                },
                "fixed_height_small_still": {
                    "height": "100",
                    "width": "56",
                    "size": "7268",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100_s.gif&ct=g"
                },
                "fixed_height_still": {
                    "height": "200",
                    "width": "112",
                    "size": "20301",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200_s.gif&ct=g"
                },
                "fixed_width": {
                    "height": "356",
                    "width": "200",
                    "size": "1635322",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w.gif&ct=g",
                    "mp4_size": "304272",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w.mp4&ct=g",
                    "webp_size": "523240",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w.webp&ct=g"
                },
                "fixed_width_downsampled": {
                    "height": "356",
                    "width": "200",
                    "size": "177883",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_d.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w_d.gif&ct=g",
                    "webp_size": "117984",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_d.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w_d.webp&ct=g"
                },
                "fixed_width_small": {
                    "height": "178",
                    "width": "100",
                    "size": "649435",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100w.gif&ct=g",
                    "mp4_size": "115215",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100w.mp4&ct=g",
                    "webp_size": "193500",
                    "webp": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100w.webp&ct=g"
                },
                "fixed_width_small_still": {
                    "height": "178",
                    "width": "100",
                    "size": "16896",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/100w_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=100w_s.gif&ct=g"
                },
                "fixed_width_still": {
                    "height": "356",
                    "width": "200",
                    "size": "52046",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/200w_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=200w_s.gif&ct=g"
                },
                "looping": {
                    "mp4_size": "2201069",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-loop.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-loop.mp4&ct=g"
                },
                "original_still": {
                    "height": "480",
                    "width": "270",
                    "size": "87462",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy_s.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy_s.gif&ct=g"
                },
                "original_mp4": {
                    "height": "480",
                    "width": "270",
                    "mp4_size": "490463",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy.mp4&ct=g"
                },
                "preview": {
                    "height": "150",
                    "width": "84",
                    "mp4_size": "49278",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-preview.mp4&ct=g"
                },
                "preview_gif": {
                    "height": "100",
                    "width": "56",
                    "size": "37306",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.gif?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-preview.gif&ct=g"
                },
                "preview_webp": {
                    "height": "100",
                    "width": "56",
                    "size": "26028",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-preview.webp?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-preview.webp&ct=g"
                },
                "hd": {
                    "height": "1080",
                    "width": "607",
                    "mp4_size": "2017528",
                    "mp4": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/giphy-hd.mp4?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=giphy-hd.mp4&ct=g"
                },
                "480w_still": {
                    "height": "853",
                    "width": "480",
                    "size": "3409669",
                    "url": "https://media0.giphy.com/media/OQkjelDb4JcuP3rEBw/480w_s.jpg?cid=8e96a843fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781&ep=v1_gifs_gifId&rid=480w_s.jpg&ct=g"
                }
            },
            "user": {
                "avatar_url": "https://media4.giphy.com/avatars/Crystalhillsorganics/4sBLawo0LsJH.jpeg",
                "banner_image": "",
                "banner_url": "",
                "profile_url": "https://giphy.com/Crystalhillsorganics/",
                "username": "Crystalhillsorganics",
                "display_name": "Crystal Hills Organics",
                "description": "Exquisite flowers, high vibe crystals, and healing herbs are blended to create the Crystal Hills product line. We have a farm and vineyard in the beautiful Okanagan Valley, in British Columbia, Canada.",
                "instagram_url": "https://instagram.com/crystalhillsorganics",
                "website_url": "http://www.crystalhills.com/",
                "is_verified": false
            },
            "analytics_response_payload": "e=ZXZlbnRfdHlwZT1HSUZfQllfSUQmY2lkPThlOTZhODQzZmhtMm4wcGtqcDZuNW93Y3BrY2V5YXN0MDBzeTduc2QwMWxrMjc4MSZnaWZfaWQ9T1FramVsRGI0SmN1UDNyRUJ3JmN0PWc",
            "analytics": {
                "onload": {
                    "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfQllfSUQmY2lkPThlOTZhODQzZmhtMm4wcGtqcDZuNW93Y3BrY2V5YXN0MDBzeTduc2QwMWxrMjc4MSZnaWZfaWQ9T1FramVsRGI0SmN1UDNyRUJ3JmN0PWc&action_type=SEEN"
                },
                "onclick": {
                    "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfQllfSUQmY2lkPThlOTZhODQzZmhtMm4wcGtqcDZuNW93Y3BrY2V5YXN0MDBzeTduc2QwMWxrMjc4MSZnaWZfaWQ9T1FramVsRGI0SmN1UDNyRUJ3JmN0PWc&action_type=CLICK"
                },
                "onsent": {
                    "url": "https://giphy-analytics.giphy.com/v2/pingback_simple?analytics_response_payload=e%3DZXZlbnRfdHlwZT1HSUZfQllfSUQmY2lkPThlOTZhODQzZmhtMm4wcGtqcDZuNW93Y3BrY2V5YXN0MDBzeTduc2QwMWxrMjc4MSZnaWZfaWQ9T1FramVsRGI0SmN1UDNyRUJ3JmN0PWc&action_type=SENT"
                }
            },
            "alt_text": ""
        },
        "meta": {
            "status": 200,
            "msg": "OK",
            "response_id": "fhm2n0pkjp6n5owcpkceyast00sy7nsd01lk2781"
        }
    },
    "message": "ok",
    "code": 200
}

### Save favorite gif
- **URL**:  `/API/favorites`
- **Method**: `POST`
- **Autentication**: `Bearer Token`
- **Parameters**:
  ```json
  {
      "gif_id": "OQkjelDb4JcuP3rEBw",
      "embed_url": "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
  }
- **Response**:
  ```json
  {
    "success": true,
    "data": {
        "user_id": 1,
        "gif_id": "OQkjelDb4JcuP3rEBw",
        "embed_url": "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
        "updated_at": "2024-07-18T21:15:20.000000Z",
        "created_at": "2024-07-18T21:15:20.000000Z",
        "id": 1
    },
    "message": "",
    "code": 200
}  

### Show favorite gifs
- **URL**:  `/API/favorites`
- **Method**: `GET`
- **Autentication**: `Bearer Token`
- **Response**:
  ```json
  [
      {
          "id": 1,
          "user_id": 1,
          "gif_id": "OQkjelDb4JcuP3rEBw",
          "embed_url": "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
          "created_at": "2024-07-18T21:15:20.000000Z",
          "updated_at": "2024-07-18T21:15:20.000000Z"
      }
  ]

### Delete favorite gif
- **URL**:  `/API/favorites`
- **Method**: `DELETE`
- **Autentication**: `Bearer Token`
- **Parameters**:
  ```json
  {
      "gif_id": "OQkjelDb4JcuP3rEBw"
  }
- **Response**:
  ```json
   {
    "success": true,
    "data": [],
    "message": "gif delete successfully",
    "code": 200
  }
