# Jumia
Job Application for Jumia Backend Developer

# Requirements
- Install [docker](https://www.docker.com/products/docker-desktop).
- (For testing) [PHPUnit](https://phpunit.de/getting-started/phpunit-8.html).

# How to use 
First you need to clone the repo (Using terminal).
`git clone https://github.com/TeknoPT/Jumia.git`

Then you gonna need to build the docker machine (Using terminal).
`cd Docker/ & docker build -t {container name lowercase} .`

After building you container, now you can run it!
`docker run -p 80:80 -v ~/src/:/var/ {container name} `

**Now you can go to you favourite Web browser.**
go to your [localhost](http://localhost/). page.


