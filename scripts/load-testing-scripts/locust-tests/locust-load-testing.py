import time
from locust import HttpUser, task, between

class QuickstartUser(HttpUser):
    wait_time = between(1, 2.5)

    def on_start(self):
        self.client.headers = {
            'Cache-Control': 'no-cache',
            'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'
        }

    @task
    def visit_home(self):
        self.client.get("/en")

    @task
    def visit_about(self):
        self.client.get("/en/about")

    @task
    def visit_ecosystem(self):
        self.client.get("/en/ecosystem")

    @task
    def visit_home_hi(self):
        self.client.get("/hi")

    @task
    def visit_about_hi(self):
        self.client.get("/hi/about")

    @task
    def visit_ecosystem_hi(self):
        self.client.get("/hi/ecosystem")
