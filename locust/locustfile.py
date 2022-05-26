from locust import HttpLocust, TaskSet, between
import json
import base64
import os


def index(l):
    l.client.get("/")

def createPost(l):
    payload = {
        "title":"Teste de Carga 1",
	    "status":"publish",
	    "content":"teste 1",
	    "excerpt":"teste 1",
        "featured_media":"12905"
    }
    headers = {
        'Authorization': 'Bearer ' + l.token,
    }
    l.client.post("/wp-json/wp/v2/posts", data=payload, headers=headers)

def createPostWithImage(l):
    files = {
        "file": open('/locust/1_mb_image.jpg', 'rb'),
    }
    with l.client.post("/wp-json/wp/v2/media",
        headers = {
            'Authorization': 'Bearer ' + l.token,
            'Content-Disposition':'attachment;filename=1_mb_image.jpg'
        },files=files, catch_response=True) as response:
        if response.status_code == 201:
            payload = {
                "title":"Teste de Carga com Imagem",
	            "status":"publish",
	            "content":"teste",
	            "excerpt":"teste",
                "featured_media": json.loads(response.content)["id"]
            }
            l.client.post("/wp-json/wp/v2/posts", data=payload, headers=headers)

class UserBehavior(TaskSet):
    def on_start(self):
        self.token = self.login()

    def login(self):
        json = {
            "username":"admin",
            "password":"admin"
        }

        headers = {
            "Content-Type": "application/json"
        }

        response = self.client.post("/wp-json/jwt-auth/v1/token", json=json, headers=headers)
        print('Response: ', response.text)
        return response.json()["token"]


    tasks={createPost:1, createPostWithImage:2}

class WebsiteUser(HttpLocust):
    task_set=UserBehavior
    stop_timeout = 60
    wait_time = between(0,1)
