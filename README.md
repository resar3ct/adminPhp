# Проектная работа:
Идея: телеграм бот, который сможет отправлять пользователям любые сообщения.

Минимальные технические требования:

1. Нужно создать собственного телеграм бота через @BotFather

2. Телеграм бот должен уметь сам инициировать отправку любых сообщений подписанным на него пользователям

3. Телеграм бот должен быть реализован в виде микросервиса на GO. Можно использовать эту библиотеку.

3.1. Сервис должен сохранять информацию о подписанных на него пользователей, такие как id, username, имя, фамилия если имеются. Информация должна храниться в любой удобной для вас базе данных, например MySQL.

3.2. Сервис должен принимать http запрос методом POST. В теле запроса должен быть указан текст сообщения.

3.3. После получения текста сообщения сервис должен сделать рассылку всем подписанным на бота пользователям от имени самого бота.

4. Источником текста сообщения должен быть сервис написанный на PHP.

4.1. Сервис должен иметь страницу с формой, которая должна иметь минимум два элемента:
а. текстовое поле, куда нужно указать текст сообщения
б. кнопка отправить

4.2. После нажатия кнопки отправить, сервис должен сохранить текст сообщения в любую удобную базу данных для истории.

4.3. После нажатия кнопки отправить, сервис должен отправить http запрос методом POST в микросервис написанный на GO.

Ограничения:
1. Функционал бота и сервисов может быть дополнен по желанию команд.
2. Нет ограничений на использование библиотек или фреймворков.
3. Дизайн для получения минимальной оценки не важен.
4. Можно использовать любые технологии (бд, очереди и т.д.)
5. У каждого сервиса должен свой репозиторий на github. Название и где будет размещен репозиторий команда решает сама.
6. Все изменения в коде должны быть внесены через pull request-ы, у которых был code review,
7. У всех pull request-ов должны быть задачи с текстовым описанием (trello, excel и т.д.)
8. Вся инфраструктура может быть развернута на локальном компьютере либо на удаленном сервере.
9. Должна быть подробная инструкция по разворачиванию всей инфраструктуры.

Оценка технического задания:
1. Работа не будет засчитана, если не будут выполнены минимальные требования.
2. Использование дополнительных инструментов будет плюсом и будет учтена при формировании окончательной оценки.
3. Присутствие внешнего дизайна будет плюсом и будет учтено при формировании окончательной оценки.
4. Расширение функционала бота и сервисов будет плюсом и будет учтено при формировании окончательной оценки.
5. Наличие тестов будет плюсом и будет учтено при формировании окончательной оценки.

Регламент работы в командах:
1. Все студенты поделены на несколько команд по 2 или 3 человека. Узнать с кем вы в команде можете у своих менторов.
2. У всех команд будут свои тимлиды. Тимлиды это - ваши менторы.
3. Тимлид будет координировать команды и направлять ее. Подсказывать при возникновении вопросов или проблем.
4. Команда должны время от времени отчитываться о проделанной работе перед своим тимлидом, и в целом держать его в курсе процесса разработки. Как это делать команды решают для себя самостоятельно вместе с тимлидом.

Оценка командной работы:
1. Тимлид будет оценивать умение команды и каждого студента вести свои задачи.
2. Каждый участник должен внести одинаковый вклад в общую командную разработку.
3. Каждый участник должен внести свой вклад в разработку всех компонентов системы (БД, сервис на php и go и т.д.)

Регламент защиты проекта.
1. 21 ноября будет предзащита проектов, где будут оценена вся разработанная система, кодовая база и функционал.
2. Команда не будет допущена на предзащиту, если получит низкую оценку командной работы.
3. После успешной предзащиты команды допускаются на финальную защиты.
4. 24 или 25 ноября пройдет финальная защита, где команды будут презентовать свои проекты. Защита будет происходит в онлайн и оффлайн формате, кому как удобнее.
5. После защиты будет озвучена финальная оценка за проект.

Что будет учитываться в финальной оценке:
1. Кодовая составляющая проекта.
2. Архитектура проекта.
3. Функционал.
4. Командная работа.
5. Индивидуальная работа каждого студента.
