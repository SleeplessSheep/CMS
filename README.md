# CMS
Content Management System (Sprint Boot)

# Makefile
build:
	./mvnw clean package

docker:
	docker build -t cmsapp .

up:
	docker-compose up -d

all: build docker up 

test: 

