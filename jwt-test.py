import requests

url = "http://127.0.0.1/wp-json/jwt-auth/v1/token"

headers = {
  "Content-Type": "application/json",
}

json = {
  "username": "admin",
  "password": "admin"
}

res = requests.post(url, headers=headers, json=json)
print(res.json()['token'])