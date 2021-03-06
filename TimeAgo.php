<?php
/**
 * Class TimeAgo
 *
 * Returns human readable time sentences
 * such as "4 minutes ago", "3 hours ago"
 */
Class TimeAgo extends \DateTime
{
    /**
     * @var DateTime
     */
    private $fromTime;

    /**
     * @var DateInterval
     */
    private $diff;

    /**
     * @param DateTime $fromTime
     * @param DateTimeZone $zone
     */
    public function __construct(\DateTime $fromTime, \DateTimeZone $zone = null)
    {
        parent::__construct(null, $zone);
        $this->fromTime = $fromTime;
        $this->diff = $this->diff($this->fromTime);
    }

    /**
     * @param DateInterval $diff
     */
    public function setInterval(\DateInterval $diff)
    {
        $this->diff = $diff;
    }

    /**
     * @return string
     */
    private function toString()
    {
        $result = '';

        if($this->diff->y){
            $result .= $this->diff->y . ($this->diff->y > 1 ? ' years ' : ' year ');
        }
        if($this->diff->m){
            $result .= $this->diff->m . ($this->diff->m > 1 ? ' months ' : ' month ');
        }
        if($this->diff->d){
            $result .= $this->diff->d . ($this->diff->d > 1 ? ' days ' : ' day ');
        }
        if($this->diff->h){
            $result .= $this->diff->h . ($this->diff->h > 1 ? ' hours ' : ' hour ');
        }
        if($this->diff->i){
            $result .= $this->diff->i . ($this->diff->i > 1 ? ' minutes ' : ' minute ');
        }
        if($this->diff->s){
            $result .= $this->diff->s . ($this->diff->s > 1 ? ' seconds ' : ' second ');
        }
        return $result;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}