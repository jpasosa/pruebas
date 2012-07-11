<?php

namespace Acme\LearnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\LearnBundle\Entity\Comments
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\LearnBundle\Entity\CommentsRepository")
 */
class Comments
{
		// RELACIONES 
		/**
		* @ORM\ManyToOne(targetEntity="Articles", inversedBy="comments")
		* @ORM\JoinColumn(name="article_id", referencedColumnName="id")
		* @return integer
		*/
		private $article;
		public function setArticle(\Acme\LearnBundle\Entity\Articles $article)
		{
			$this->article = $article;
		}
		
		public function getArticle()
		{
			return $this->article;
		}
		
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var text $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var integer $reply_to
     *
     * @ORM\Column(name="reply_to", type="integer")
     */
    private $reply_to;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set reply_to
     *
     * @param integer $replyTo
     */
    public function setReplyTo($replyTo)
    {
        $this->reply_to = $replyTo;
    }

    /**
     * Get reply_to
     *
     * @return integer 
     */
    public function getReplyTo()
    {
        return $this->reply_to;
    }
}