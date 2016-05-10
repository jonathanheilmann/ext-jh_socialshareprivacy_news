<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Jonathan Heilmann <mail@jonathan-heilmann.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * ViewHelper to add the heise.de socialshareprivacy-bar
 *
 * Examples
 * ==============
 *
 * <jh:SocialSharePrivacy></jh:SocialSharePrivacy>
 * Result: socialshareprivacy-bar
 *
 *
 * @package TYPO3
 * @subpackage tx_jhsocialshareprivacynews
 */
class Tx_JhSocialshareprivacyNews_ViewHelpers_SocialSharePrivacyViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render the socialshareprivacy-bar
	 *
	 * @param string $href Given url, if empty, current url is used.
	 * @param string $uid Uid of news item. Please add a prefix if a list- and details-view are on the same page.
	 * @return string
	 */
	public function render($href = '', $uid = '') {
		$this->extKey = 'jh_socialshareprivacy_news';
		//get configuration
		$this->config = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_news.']['tx_jhsocialshareprivacynews.'];
		//t3lib_utility_Debug::debug($this->config);

		//t3lib_utility_Debug::debug($href);
		//t3lib_utility_Debug::debug($uid);

		//get uri
		if(empty($this->config['uri'])) {
			$this->config['uri'] = (!empty($href)) ? $href : t3lib_div::getIndpEnv('TYPO3_REQUEST_URL');

			// absolute urls are required
			$this->config['uri'] = Tx_News_Utility_Url::prependDomain($this->config['uri']);
		}

		//get uid of newsItem
		if(empty($uid)) {
			//prevent from empty uid if not set in template
			$uid = \TYPO3\CMS\Core\Utility\GeneralUtility::md5int($this->config['href']).'-0';
		}

		// render js-code
		$this->tmpl = $this->setTmpl($uid);

		// include CSS if set
		if($this->config['css_path'] != '') {
			$GLOBALS['TSFE']->pSetup['includeCSS.'][$this->extKey.'_1'] = $this->config['css_path'];
		}

		//include javascript files
		if($this->config['use_jquery_from_extension'] == 1) {
			$GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey.'_1'] = $this->config['jquery_path'];
		}
		if($this->config['socialshareprivacy_path'] != '') {
			$GLOBALS['TSFE']->pSetup['includeJS.'][$this->extKey.'_2'] = $this->config['socialshareprivacy_path'];
		}

		$code = '';
		if($this->config['js_to_head'] == 1) {
			$GLOBALS['TSFE']->setJS($this->extKey, $this->tmpl);
		} else {
			$code = '<script type="text/javascript">' . $this->tmpl . '</script>';
		}
		$code .= '<div id="socialshareprivacy_'.$uid.'"></div>';

		return $code;
	}

	/**
	 * Render the socialshareprivacy-bar javascript
	 *
	 * @return string
	 */
	private function setTmpl($uid) {
		$img_path = t3lib_extMgm::siteRelPath($this->extKey).'Resources/Public/socialshareprivacy/socialshareprivacy/images/';

		return 'jQuery(document).ready(function($){
	$("#socialshareprivacy_'.$uid.'").socialSharePrivacy({
		services : {
			facebook : {
				\'status\'	  : \''.$this->getSettingFB('status','on').'\',
				\'dummy_img\'	  : \''.$GLOBALS['TSFE']->tmpl->getFileName($this->getSettingFB('dummy_img','')).'\',
				\'txt_fb_off\'  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_fb_off', $this->extKey).'\',
				\'txt_fb_on\'   : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_fb_on', $this->extKey).'\',
				\'perma_option\': \''.$this->getSettingFB('perma_option','on').'\',
				\'display_name\': \''.$this->getSettingFB('display_name','Facebook').'\',
				\'referrer_track\':\''.$this->getSettingFB('referrer_track','').'\',
				\'action\'	  : \''.$this->getSettingFB('action','recommend').'\',
				\'txt_info\'	  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('fb_txt_info', $this->extKey).'\',
				\'language\'	  : \''.$this->getSettingFB('language','de_DE').'\',
				\'dummy_caption\'	  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('fb_dummy_caption', $this->extKey).'\'
			},
			twitter : {
				\'status\'	  : \''.$this->getSettingTW('status','on').'\',
				\'dummy_img\'	  : \''.$GLOBALS['TSFE']->tmpl->getFileName($this->getSettingTW('dummy_img','')).'\',
				\'txt_twitter_off\'  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_twitter_off', $this->extKey).'\',
				\'txt_twitter_on\'   : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_twitter_on', $this->extKey).'\',
				\'perma_option\': \''.$this->getSettingTW('perma_option','on').'\',
				\'display_name\': \''.$this->getSettingTW('display_name','Twitter').'\',
				\'referrer_track\':\''.$this->getSettingTW('referrer_track','').'\',
				\'txt_info\'	  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('twitter_txt_info', $this->extKey).'\',
				\'language\'	  : \''.$this->getSettingTW('language','de').'\',
				\'dummy_caption\'	  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('twitter_dummy_caption', $this->extKey).'\'
			},
			gplus : {
				\'status\'	  : \''.$this->getSettingGP('status','on').'\',
				\'dummy_img\'	  : \''.$GLOBALS['TSFE']->tmpl->getFileName($this->getSettingGP('dummy_img','')).'\',
				\'txt_gplus_off\'  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_gplus_off', $this->extKey).'\',
				\'txt_gplus_on\'   : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_gplus_on', $this->extKey).'\',
				\'perma_option\': \''.$this->getSettingGP('perma_option','on').'\',
				\'display_name\': \''.$this->getSettingGP('display_name','Google+').'\',
				\'referrer_track\':\''.$this->getSettingGP('referrer_track','').'\',
				\'txt_info\'	  : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('gplus_txt_info', $this->extKey).'\',
				\'language\'	  : \''.$this->getSettingGP('language','de').'\'
			}
		},
	\'info_link\'         : \''.$this->getSetting('info_link','http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html').'\',
	\'txt_help\'          : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('txt_help', $this->extKey).'\',
	\'settings_perma\'    : \''.\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('settings_perma', $this->extKey).'\',
	\'css_path\'          : \'\',
	\'cookie_path\'       : \''.$this->getSetting('cookie_path','/').'\',
	\'cookie_domain\'     :	\''.$this->getSetting('cookie_domain',t3lib_div::getIndpEnv('TYPO3_HOST_ONLY')).'\',
	\'cookie_expires\'    : \''.$this->getSetting('cookie_expires','356').'\',
	\'uri\'               : \''.$this->config['uri'].'\'
	});
});';
	}

		/**
	 * returns given typoscript-value or default if typoscript empty: default settings
	 *
	 * @param  string        setting
	 * @param  string        default value
	 * @param  array
	 * @return void
	 **/
	private function getSetting($setting, $default) {
		$lConf = $this->config;
		if ( isset($lConf[$setting]) && $lConf[$setting] == true) {
			return $lConf[$setting];
		} else {
			return $default;
		}
	}

	/**
	 * returns given typoscript-value or default if typoscript empty: facebook settings
	 *
	 * @param  string        setting
	 * @param  string        default value
	 * @param  array
	 * @return void
	 **/
	private function getSettingFB($setting, $default) {
		$lConf = $this->config['services.']['facebook.'];
		if ( isset($lConf[$setting]) && $lConf[$setting] == true) {
			return $lConf[$setting];
		} else {
			return $default;
		}
	}

	/**
	 * returns given typoscript-value or default if typoscript empty: twitter settings
	 *
	 * @param  string        setting
	 * @param  string        default value
	 * @return void
	 **/
	private function getSettingTW($setting, $default) {
		$lConf = $this->config['services.']['twitter.'];
		if ( isset($lConf[$setting]) && $lConf[$setting] == true) {
			return $lConf[$setting];
		} else {
			return $default;
		}
	}

	/**
	 * returns given typoscript-value or default if typoscript empty: Google+-Settings
	 *
	 * @param  string        setting
	 * @param  string        default value
	 * @param  array
	 * @return void
	 **/
	private function getSettingGP($setting, $default) {
		$lConf = $this->config['services.']['gplus.'];
		if ( isset($lConf[$setting]) && $lConf[$setting] == true) {
			return $lConf[$setting];
		} else {
			return $default;
		}
	}
}

?>