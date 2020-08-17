<?php


namespace Patterns\Structual\Adapter;
/**
 * Адаптер – класс, который связывает Целевой интерфейс и Адаптируемый класс.
 * Это позволяет приложению использовать Slack API для отправки уведомлений.
 */

class SlackNotification implements Notification
{
    private SlackApi $slack;
    private $chatId;

    public function __construnct(SlackApi $slack, string $chatId){
        $this->chatId = $chatId;
        $this->slack = $slack;
    }
    /**
     * Адаптер способен адаптировать интерфейсы и преобразовывать входные данные
     * в формат, необходимый Адаптируемому классу.
     */
    public function send(string $title, string $message)
    {
        $slackMessage = "#".$title."# ".strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}