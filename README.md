# CSOJ

This is the project of CYSY LAN Online Judge, which is powered by UOJ.

maintainer: sevenki

If you have any problems about CSOJ, please contact [sevenki](https://github.com/sevenki666/).

24/12/15: This project is still preparing.
25/01/17: Some basic functions are done. We will update as needed.

Tips:

- if you cannot connect ghcr.io during docker composing, you can modify the `docker-compose.yml` and change `ghcr.io` into `ghcr.mirrorify.net`.

Todo List:

- [x] Update compilers.
- [x] Feature: ~~User Group~~ , and change the color of administrator's display. Note: I don't have much time so I just put the administrator list into uoj.js. I know it's stupid.
- [x] Use cravatar instead of gravatar.
- [x] Local Mathjax.
- [x] Feature: Refuse to register accounts by oneself.
- [ ] ~~Add reference and solution link in problems.~~ Use HTML in statement to implement this function.
- [ ] ~~Add "Contest Conclusion System".~~ Use Blog is enough.
- [ ] ~~Register contest while contest is running.~~
- [x] Realname system.
- [x] Attachment download.

以下为 UOJ 社区版仓库 README.md 原文。

---


<p align="center"><img src="https://github.com/UniversalOJ/UOJ-System/blob/master/web/images/logo.png?raw=true"></p>

# Universal Online Judge

> #### 一款通用的在线评测系统。

## 特性

- 前后端全面更新为 Bootstrap 4 + PHP 7。
- 多种部署方式，各取所需、省心省力、方便快捷。
- 各组成部分可单点部署，也可分离部署；支持添加多个评测机。
- 题目搜索，全局放置，任意页面均可快速到达。
- 所有题目从编译、运行到评分，都可以由出题人自定义。
- 引入 Extra Tests 和 Hack 机制，更加严谨、更有乐趣。
- 支持 OI/IOI/ACM 等比赛模式；比赛内设有提问区域。
- 博客功能，不仅可撰写图文内容，也可制作幻灯片。

## 文档

有关安装、管理、维护，可参阅：[https://universaloj.github.io/](https://universaloj.github.io/)

## 感谢

- [vfleaking](https://github.com/vfleaking) 将 UOJ 代码[开源](https://github.com/vfleaking/uoj)
- 向原项目或本项目贡献代码的人
- 给我们启发与灵感以及提供意见和建议的人

