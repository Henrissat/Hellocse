-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 14:18
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- * --  Base de données : `hellocse` -- * --


-- Structure de la table `stars`


CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `descriptif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


table `stars`

INSERT INTO `stars` (`id`, `name`, `img`, `descriptif`) VALUES
(1, 'Angelina Jolie', 'https://i.pinimg.com/originals/41/a8/ee/41a8ee131c1f98b09ca6ba9332017a96.jpg', 'Angelina Jolie[4] DCMG (/dʒoʊˈliː/; born \r\n                        Angelina Jolie Voight,[5] June 4, 1975) is an American actress, filmmaker, and humanitarian. The recipient of numerous accolades,\r\n                         including an Academy Award and three Golden Globe Awards, she has been named Hollywood\'s highest-paid actress multiple times.<br>\r\n\r\n                        Jolie made her screen debut as a child alongside her father, Jon Voight, in Lookin\' to Get Out (1982), and her film career began\r\n                         in earnest a decade later with the low-budget production Cyborg 2 (1993), followed by her first leading role in a major film, \r\n                         Hackers (1995). She starred in the critically acclaimed biographical cable films George Wallace (1997) and Gia (1998), and won\r\n                          an Academy Award for Best Supporting Actress for her performance in the 1999 drama Girl, Interrupted. Her starring role as \r\n                          the video game heroine Lara Croft in Lara Croft: Tomb Raider (2001) established her as a leading Hollywood actress.<br><br> She \r\n                          continued her action-star career with Mr. & Mrs. Smith (2005), Wanted (2008), Salt (2010), and The Tourist (2010), and \r\n                          received critical acclaim for her performances in the dramas A Mighty Heart (2007) and Changeling (2008), the latter of \r\n                          which earned her a nomination for an Academy Award for Best Actress. Her biggest commercial success came with the fantasy\r\n                          picture Maleficent (2014). She is also known for her voice role in the animation film series Kung Fu Panda (2008–present).<br> \r\n                          Jolie has also directed and written several war dramas, namely In the Land of Blood and Honey (2011), Unbroken (2014), and \r\n                          First They Killed My Father (2017). In 2021, Jolie portrayed Thena in the Marvel Cinematic Universe superhero film Eternals. '),
(2, 'Megan Fox', 'https://fr-academic.com/pictures/frwiki/77/Megan_Fox_7.jpg', 'Megan Denise Fox[1] (born May 16, 1986) is an \r\n                        American actress and model. She has made multiple appearances in major film franchises, including the Transformers franchise, \r\n                        as well as numerous magazines such as Maxim, Rolling Stone, and FHM.[2][3] She is the recipient of several accolades, including\r\n                         two Scream Awards and four Teen Choice Awards.<br><br>\r\n                        Fox made her acting debut in the family film Holiday in the Sun (2001), which was followed by numerous supporting roles in\r\n                         film and television, such as the teen musical comedy Confessions of a Teenage Drama Queen (2004), as well as a starring role\r\n                          in the ABC sitcom Hope & Faith (2004–2006).<br> Her breakout role was as Mikaela Banes in the blockbuster action film \r\n                          Transformers (2007), which she reprised in its sequel Transformers: Revenge of the Fallen (2009).<br> She also portrayed \r\n                          the titular character in the horror comedy Jennifer\'s Body (2009), starred as April O\'Neil in the superhero action film \r\n                          Teenage Mutant Ninja Turtles (2014) and its sequel Teenage Mutant Ninja Turtles: Out of the Shadows (2016), and starred \r\n                          as Reagan Lucas in the fifth and sixth seasons of the Fox sitcom New Girl (2016–2017). ');

-- Index pour la table `stars`
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT pour la table `stars`
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
