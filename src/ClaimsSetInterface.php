<?php

namespace League\OpenIdConnectClaims;

interface ClaimsSetInterface extends \JsonSerializable
{
    /**
     * Set the identifier for the end user
     *
     * @param string $id
     */
    public function setIdentifier($id);

    /**
     * Set the user's name
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Set the user's first name
     *
     * @param string $firstName
     */
    public function setFirstName($firstName);

    /**
     * Set the user's middle name
     *
     * @param string $middleName
     */
    public function setMiddleName($middleName);

    /**
     * Set the user's last name
     *
     * @param string $lastName
     */
    public function setLastName($lastName);

    /**
     * Set the user's nickname
     *
     * @param string $nickname
     */
    public function setNickname($nickname);

    /**
     * Set the user's username
     *
     * @param string $username
     */
    public function setUsername($username);

    /**
     * Set the URL to user's profile
     *
     * @param string $url
     */
    public function setProfileUrl($url);

    /**
     * Set the URL to the user's picture
     *
     * @param string $url
     */
    public function setPictureUrl($url);

    /**
     * Set the URL to the user's website
     *
     * @param string $url
     */
    public function setWebsite($url);

    /**
     * Set the user's email
     *
     * @param string $email
     */
    public function setEmail($email);

    /**
     * Set to true if the user's email has been verified
     *
     * @param bool $verified
     */
    public function setEmailVerified($verified = true);

    /**
     * Set the user's gender
     *
     * @param string $gender
     */
    public function setGender($gender);

    /**
     * Set the user's birth date
     *
     * @param string      $year Set the year to 0000 to not declare the year
     * @param string|null $month
     * @param string|null $day
     */
    public function setBirthDate($year = '0000', $month = null, $day = null);

    /**
     * Set the user's zoneinfo
     *
     * @param string $zoneInfo (e.g. Europe/London)
     */
    public function setZoneInfo($zoneInfo);

    /**
     * Set the user's locale
     *
     * @param string $locale
     */
    public function setLocale($locale);

    /**
     * Set the user's phone number
     *
     * @param string      $phoneNumber
     * @param string|null $extension
     */
    public function setPhoneNumber($phoneNumber, $extension = null);

    /**
     * Set to true if the user's phone number has been verified
     *
     * @param bool $verified
     */
    public function setPhoneNumberVerified($verified = true);

    /**
     * Set the user's address street
     *
     * @param string $street  Full street address component, which MAY include house number, street name,
     *                        Post Office Box, and multi-line extended street address information. This
     *                        field MAY contain multiple lines, separated by newlines. Newlines can be
     *                        represented either as a carriage return/line feed pair ("\r\n") or as a single
     *                        line feed character ("\n").
     */
    public function setAddressStreet($street);

    /**
     * Set the user's address locality
     *
     * @param string $locality City or locality component
     */
    public function setAddressLocality($locality);

    /**
     * Set the user's address postal code
     *
     * @param string $postalCode Zip code or postal code component.
     */
    public function setAddressPostalCode($postalCode);

    /**
     * Set the user's address region
     *
     * @param string $region State, province, prefecture, or region component.
     */
    public function setAddressRegion($region);

    /**
     * Set the user's address country
     *
     * @param string $country Country name component.
     */
    public function setAddressCountry($country);

    /**
     * Set the user's address as a formatted string
     *
     * @param string|null $formattedAddress    Full mailing address, formatted for display or use on a mailing list.
     *                                         This field MAY contain multiple lines, separated by newlines. Newlines
     *                                         can be represented either as a carriage return/line feed pair ("\r\n")
     *                                         or as a single line feed character ("\n").
     */
    public function setFormattedAddress($formattedAddress);

    /**
     * Get a specific claim
     *
     * @param string $claim
     *
     * @return mixed
     */
    public function getClaim($claim);

    /**
     * Set a claim
     *
     * @param string $claim
     * @param mixed  $value
     */
    public function setClaim($claim, $value);
}
