<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use DateTimeInterface;
use InvalidArgumentException;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Embed
 * @package Bytes\DiscordResponseBundle\Objects\Embed
 */
class Embed
{
    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     * @Assert\Url
     */
    protected $url;

    /**
     * ISO8601 output
     * @var DateTimeInterface|null
     */
    protected $timestamp;

    /**
     * @var int|float|null
     */
    protected $color;

    /**
     * @var Footer|null
     */
    protected $footer;

    /**
     * @var Image|null
     */
    protected $image;

    /**
     * @var Image|null
     */
    protected $thumbnail;

    /**
     * @var Author|null
     */
    protected $author;

    /**
     * @var Field[]|null
     */
    protected $fields;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title ?? '';
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description ?? '';
        return $this;
    }

    /**
     * @return Footer|null
     */
    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    /**
     * @param Footer|string|null $footer Either a Footer object or text
     * @param string|null $iconUrl url of footer icon (only supports http(s) and attachments), ignored if $footer is a Footer object
     *
     * @return $this
     */
    public function setFooter($footer, string $iconUrl = null): self
    {
        if (is_string($footer)) {
            $object = new Footer();
            $object->setText($footer);
            $object->setIconUrl($iconUrl);
            $footer = $object;
        }
        if (!($footer instanceof Footer)) {
            throw new InvalidArgumentException('The supplied argument is not an instance of the Footer class or text.');
        }

        $this->footer = $footer;
        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author|string|null $author Either an Author object or name
     * @param string|null $url url of author, ignored if $author is an Author object
     * @param string|null $iconUrl url of author icon (only supports http(s) and attachments), ignored if $author is an Author object
     *
     * @return $this
     */
    public function setAuthor($author, string $url = null, string $iconUrl = null): self
    {
        if (is_string($author)) {
            $object = new Author();
            $object->setName($author);
            $object->setUrl($url);
            $object->setIconUrl($iconUrl);
            $author = $object;
        }
        if (!($author instanceof Author)) {
            throw new InvalidArgumentException('The supplied argument is not an instance of the Author class or text.');
        }

        $this->author = $author;
        return $this;
    }

    /**
     * @return Field[]|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param Field[]|null $fields
     * @return $this
     */
    public function setFields(?array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Field|string|null $field Either a Field object or field name
     * @param string|null $value Value of field, ignored if $field is a Field object
     * @param bool $inline Should the field display inline? Ignored if $field is a Field object
     *
     * @return $this
     */
    public function addField($field, string $value = null, bool $inline = false): self
    {
        if (is_string($field)) {
            $object = new Field();
            $object->setName($field);
            $object->setValue($value ?? '');
            $object->setInline($inline);
            $field = $object;
        }
        if (!($field instanceof Field)) {
            throw new InvalidArgumentException('The supplied argument is not an instance of the Field class or text.');
        }
        if(empty($field->getValue())) {
            throw new InvalidArgumentException('Field value cannot be blank.');
        }

        $this->fields[] = $field;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url ?? '';
        return $this;
    }

    /**
     * @return float|int
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param float|int $color
     * @return $this
     */
    public function setColor($color): self
    {
        $this->color = is_int($color) ? $color : hexdec($color);
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|string $image
     * @return $this
     */
    public function setImage($image): self
    {
        if (is_string($image)) {
            $object = new Image();
            $object->setUrl($image);
            $image = $object;
        }
        if (!($image instanceof Image)) {
            throw new InvalidArgumentException('The supplied image is not an instance of the Image class or a URL.');
        }
        $this->image = $image;
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getThumbnail(): ?Image
    {
        return $this->thumbnail;
    }

    /**
     * @param Image|string $thumbnail
     * @param bool $uuid Adds a unique id to the end of the URL as a query string if true. Ignored if $thumbnail is an Image object.
     * @return $this
     */
    public function setThumbnail($thumbnail, bool $uuid = false): self
    {
        if (is_string($thumbnail)) {
            $object = new Image();
            $object->setUrl($thumbnail, $uuid);
            $thumbnail = $object;
        }
        if (!($thumbnail instanceof Image)) {
            throw new InvalidArgumentException('The supplied image is not an instance of the Image class or a URL.');
        }
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     * @Ignore()
     */
    public function getTimestamp(): ?DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface|null $timestamp
     * @return $this
     */
    public function setTimestamp(?DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Returns an ISO-8601 formatted date string. Note that it uses ATOM and not ISO-8601 because of backwards compatibility. See link below.
     * @return string|null
     *
     * @SerializedName("timestamp")
     *
     * @link https://www.php.net/manual/en/class.datetimeinterface.php#datetime.constants.types
     */
    public function getFormattedTimestamp(): ?string
    {
        if (!empty($this->timestamp)) {
            return $this->timestamp->format(DateTimeInterface::ATOM);
        } else {
            return null;
        }
    }
}