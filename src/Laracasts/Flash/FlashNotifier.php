<?php

namespace Laracasts\Flash;

class FlashNotifier
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;
    protected $namespace = 'flash_notification';

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param  string $message
     * @return $this
     */
    public function info($message)
    {
        $this->message($message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message)
    {
        $this->message($message, 'danger');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning');

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @param  string $level
     * @return $this
     */
    public function overlay($message, $title = 'Notice', $level = 'info')
    {
        $this->message($message, $level);

        $this->session->flash($this->namespace . '.overlay', true);
        $this->session->flash($this->namespace . '.title', $title);

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($message, $level = 'info')
    {
        $this->session->flash($this->namespace . '.message', $message);
        $this->session->flash($this->namespace . '.level', $level);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash($this->namespace . '.important', true);

        return $this;
    }

    /**
     * Set the namespace for notification
     *
     * @return $this
     */
    public function setNamespace($namespace = 'flash_notification')
    {
        $this->namespace = $namespace;

        return $this;
    }
}

