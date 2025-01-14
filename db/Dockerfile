FROM mysql:5.7
LABEL org.opencontainers.image.source=https://github.com/sevenki666/CSOJ
LABEL org.opencontainers.image.description="CSOJ Database"
LABEL org.opencontainers.image.licenses=MIT

ADD . /opt/uoj_db
WORKDIR /opt/uoj_db

RUN sh install.sh

ENV LANG=C.UTF-8 TZ=Asia/Shanghai
