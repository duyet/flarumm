<?php
/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2015 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/

class Renderer_d4a7fc5bc894064b8d7fdc1f35a3ea7f5c146ae4 extends \s9e\TextFormatter\Renderer
{
	protected $params=array('PROFILE_URL'=>'');
	protected static $tagBranches=array('B'=>0,'C'=>1,'CODE'=>2,'DEL'=>3,'E'=>4,'EM'=>5,'EMAIL'=>6,'H1'=>7,'H2'=>8,'H3'=>9,'H4'=>10,'H5'=>11,'H6'=>12,'HR'=>13,'I'=>14,'IMG'=>15,'LI'=>16,'LIST'=>17,'POSTMENTION'=>18,'QUOTE'=>19,'S'=>20,'STRONG'=>21,'SUP'=>22,'U'=>23,'URL'=>24,'USERMENTION'=>25,'br'=>26,'e'=>27,'i'=>27,'s'=>27,'p'=>28);
	protected static $bt7D0C6487=array(':\'('=>0,':\')'=>1,':('=>2,':)'=>3,':*'=>4,':D'=>5,':O'=>6,':P'=>7,':|'=>8,';)'=>9,'>:('=>10,'B)'=>11);
	protected $xpath;
	public function __sleep()
	{
		$props = get_object_vars($this);
		unset($props['out'], $props['proc'], $props['source'], $props['xpath']);
		return array_keys($props);
	}
	public function renderRichText($xml)
	{
		if (!isset($this->quickRenderingTest) || !preg_match($this->quickRenderingTest, $xml))
			try
			{
				return $this->renderQuick($xml);
			}
			catch (\Exception $e)
			{
			}
		$dom = $this->loadXML($xml);
		$this->xpath = new \DOMXPath($dom);
		$this->out = '';
		$this->at($dom->documentElement);
		$this->xpath = null;
		return $this->out;
	}
	protected function at(\DOMNode $root)
	{
		if ($root->nodeType === 3)
			$this->out .= htmlspecialchars($root->textContent,0);
		else
			foreach ($root->childNodes as $node)
				if (!isset(self::$tagBranches[$node->nodeName]))
					$this->at($node);
				else
				{
					$tb = self::$tagBranches[$node->nodeName];
					if($tb<15)if($tb<8)if($tb<4)if($tb===0){$this->out.='<b>';$this->at($node);$this->out.='</b>';}elseif($tb===1){$this->out.='<code>';$this->at($node);$this->out.='</code>';}elseif($tb===2){$this->out.='<pre data-s9e-livepreview-postprocess="if(\'undefined\'!==typeof hljs){var a=this.innerHTML;a in hljs._?this.innerHTML=hljs._[a]:(Object.keys&amp;&amp;7&lt;Object.keys(hljs._).length&amp;&amp;(hljs._={}),hljs.highlightBlock(this.firstChild),hljs._[a]=this.innerHTML)}"><code class="'.htmlspecialchars($node->getAttribute('lang'),2).'">';$this->at($node);$this->out.='</code></pre><script>if("undefined"===typeof hljs){var a=document.getElementsByTagName("head")[0],b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.href=\'//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/default.min.css\';a.appendChild(b);b=document.createElement("script");b.type="text/javascript";b.onload=function(){hljs._={};hljs.initHighlighting()};b.async=!0;b.src=\'//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js\';a.appendChild(b)}</script>';}else{$this->out.='<del>';$this->at($node);$this->out.='</del>';}elseif($tb===4)if(isset(self::$bt7D0C6487[$node->textContent])){$n=self::$bt7D0C6487[$node->textContent];if($n<6)if($n<3)if($n===0)$this->out.='😢';elseif($n===1)$this->out.='😂';else$this->out.='😟';elseif($n===3)$this->out.='😄';elseif($n===4)$this->out.='😘';else$this->out.='😃';elseif($n<9)if($n===6)$this->out.='😮';elseif($n===7)$this->out.='😜';else$this->out.='😐';elseif($n===9)$this->out.='😉';elseif($n===10)$this->out.='😡';else$this->out.='😎';}else$this->out.=htmlspecialchars($node->textContent,0);elseif($tb===5){$this->out.='<em>';$this->at($node);$this->out.='</em>';}elseif($tb===6){$this->out.='<a href="mailto:'.htmlspecialchars($node->getAttribute('email'),2).'">';$this->at($node);$this->out.='</a>';}else{$this->out.='<h1>';$this->at($node);$this->out.='</h1>';}elseif($tb<12)if($tb===8){$this->out.='<h2>';$this->at($node);$this->out.='</h2>';}elseif($tb===9){$this->out.='<h3>';$this->at($node);$this->out.='</h3>';}elseif($tb===10){$this->out.='<h4>';$this->at($node);$this->out.='</h4>';}else{$this->out.='<h5>';$this->at($node);$this->out.='</h5>';}elseif($tb===12){$this->out.='<h6>';$this->at($node);$this->out.='</h6>';}elseif($tb===13)$this->out.='<hr>';else{$this->out.='<i>';$this->at($node);$this->out.='</i>';}elseif($tb<22)if($tb<19)if($tb===15)$this->out.='<img src="'.htmlspecialchars($node->getAttribute('src'),2).'" title="'.htmlspecialchars($node->getAttribute('title'),2).'" alt="'.htmlspecialchars($node->getAttribute('alt'),2).'">';elseif($tb===16){$this->out.='<li>';$this->at($node);$this->out.='</li>';}elseif($tb===17)if(!$node->hasAttribute('type')){$this->out.='<ul>';$this->at($node);$this->out.='</ul>';}elseif($this->xpath->evaluate('starts-with(@type,\'decimal\')or starts-with(@type,\'lower\')or starts-with(@type,\'upper\')',$node)){$this->out.='<ol style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'">';$this->at($node);$this->out.='</ol>';}else{$this->out.='<ul style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'">';$this->at($node);$this->out.='</ul>';}else$this->out.='<a href="/d/'.htmlspecialchars($node->getAttribute('discussionid'),2).'/'.htmlspecialchars($node->getAttribute('number'),2).'" class="PostMention" data-id="'.htmlspecialchars($node->getAttribute('id'),2).'">'.htmlspecialchars($node->getAttribute('username'),0).'</a>';elseif($tb===19){$this->out.='<blockquote';if(!$node->hasAttribute('author'))$this->out.=' class="uncited"';$this->out.='><div>';if($node->hasAttribute('author'))$this->out.='<cite>'.htmlspecialchars($node->getAttribute('author'),0).' wrote:</cite>';$this->at($node);$this->out.='</div></blockquote>';}elseif($tb===20){$this->out.='<s>';$this->at($node);$this->out.='</s>';}else{$this->out.='<strong>';$this->at($node);$this->out.='</strong>';}elseif($tb<26)if($tb===22){$this->out.='<sup>';$this->at($node);$this->out.='</sup>';}elseif($tb===23){$this->out.='<u>';$this->at($node);$this->out.='</u>';}elseif($tb===24){$this->out.='<a href="'.htmlspecialchars($node->getAttribute('url'),2).'" target="_blank" rel="nofollow"';if($node->hasAttribute('title'))$this->out.=' title="'.htmlspecialchars($node->getAttribute('title'),2).'"';$this->out.='>';$this->at($node);$this->out.='</a>';}else$this->out.='<a href="'.htmlspecialchars($this->params['PROFILE_URL'].$node->getAttribute('username'),2).'" class="UserMention">@'.htmlspecialchars($node->getAttribute('username'),0).'</a>';elseif($tb===26)$this->out.='<br>';elseif($tb===27);else{$this->out.='<p>';$this->at($node);$this->out.='</p>';}
				}
	}
	private static $static=array('/B'=>'</b>','/C'=>'</code>','/CODE'=>'</code></pre><script>if("undefined"===typeof hljs){var a=document.getElementsByTagName("head")[0],b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.href=\'//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/default.min.css\';a.appendChild(b);b=document.createElement("script");b.type="text/javascript";b.onload=function(){hljs._={};hljs.initHighlighting()};b.async=!0;b.src=\'//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js\';a.appendChild(b)}</script>','/DEL'=>'</del>','/EM'=>'</em>','/EMAIL'=>'</a>','/H1'=>'</h1>','/H2'=>'</h2>','/H3'=>'</h3>','/H4'=>'</h4>','/H5'=>'</h5>','/H6'=>'</h6>','/I'=>'</i>','/LI'=>'</li>','/QUOTE'=>'</div></blockquote>','/S'=>'</s>','/STRONG'=>'</strong>','/SUP'=>'</sup>','/U'=>'</u>','/URL'=>'</a>','B'=>'<b>','C'=>'<code>','DEL'=>'<del>','EM'=>'<em>','H1'=>'<h1>','H2'=>'<h2>','H3'=>'<h3>','H4'=>'<h4>','H5'=>'<h5>','H6'=>'<h6>','HR'=>'<hr>','I'=>'<i>','LI'=>'<li>','S'=>'<s>','STRONG'=>'<strong>','SUP'=>'<sup>','U'=>'<u>');
	private static $dynamic=array('CODE'=>array('(^[^ ]+(?> (?!lang=)[^=]+="[^"]*")*(?> lang="([^"]*)")?.*)s','<pre data-s9e-livepreview-postprocess="if(\'undefined\'!==typeof hljs){var a=this.innerHTML;a in hljs._?this.innerHTML=hljs._[a]:(Object.keys&amp;&amp;7&lt;Object.keys(hljs._).length&amp;&amp;(hljs._={}),hljs.highlightBlock(this.firstChild),hljs._[a]=this.innerHTML)}"><code class="$1">'),'EMAIL'=>array('(^[^ ]+(?> (?!email=)[^=]+="[^"]*")*(?> email="([^"]*)")?.*)s','<a href="mailto:$1">'),'IMG'=>array('(^[^ ]+(?> (?!(?>alt|src|title)=)[^=]+="[^"]*")*(?> alt="([^"]*)")?(?> (?!(?>src|title)=)[^=]+="[^"]*")*(?> src="([^"]*)")?(?> (?!title=)[^=]+="[^"]*")*(?> title="([^"]*)")?.*)s','<img src="$2" title="$3" alt="$1">'),'URL'=>array('(^[^ ]+(?> (?!(?>title|url)=)[^=]+="[^"]*")*( title="[^"]*")?(?> (?!url=)[^=]+="[^"]*")*(?> url="([^"]*)")?.*)s','<a href="$2" target="_blank" rel="nofollow"$1>'));
	private static $attributes;
	private static $quickBranches=array('E'=>0,'POSTMENTION'=>1,'QUOTE'=>2,'USERMENTION'=>3);
	public $quickRenderingTest='(<LIST[ />])';

	protected function renderQuick($xml)
	{
		$xml = $this->decodeSMP($xml);
		self::$attributes = array();
		$html = preg_replace_callback(
			'(<(?:(?!/)((?>E|HR|IMG|(?>POST|USER)MENTION))(?: [^>]*)?>.*?</\\1|(/?(?!br/|p>)[^ />]+)[^>]*?(/)?)>)',
			array($this, 'quick'),
			preg_replace(
				'(<[eis]>[^<]*</[eis]>)',
				'',
				substr($xml, 1 + strpos($xml, '>'), -4)
			)
		);

		return str_replace('<br/>', '<br>', $html);
	}

	protected function quick($m)
	{
		if (isset($m[2]))
		{
			$id = $m[2];

			if (isset($m[3]))
			{
				unset($m[3]);

				$m[0] = substr($m[0], 0, -2) . '>';
				$html = $this->quick($m);

				$m[0] = '</' . $id . '>';
				$m[2] = '/' . $id;
				$html .= $this->quick($m);

				return $html;
			}
		}
		else
		{
			$id = $m[1];

			$lpos = 1 + strpos($m[0], '>');
			$rpos = strrpos($m[0], '<');
			$textContent = substr($m[0], $lpos, $rpos - $lpos);

			if (strpos($textContent, '<') !== false)
				throw new \RuntimeException;

			$textContent = htmlspecialchars_decode($textContent);
		}

		if (isset(self::$static[$id]))
			return self::$static[$id];

		if (isset(self::$dynamic[$id]))
		{
			list($match, $replace) = self::$dynamic[$id];
			return preg_replace($match, $replace, $m[0], 1, $cnt);
		}

		if (!isset(self::$quickBranches[$id]))
		{
			if ($id[0] === '!' || $id[0] === '?' || preg_match('(^/?LIST$)', $id))
				throw new \RuntimeException;
			return '';
		}

		$attributes = array();
		if (strpos($m[0], '="') !== false)
		{
			preg_match_all('(([^ =]++)="([^"]*))S', substr($m[0], 0, strpos($m[0], '>')), $matches);
			foreach ($matches[1] as $i => $attrName)
				$attributes[$attrName] = $matches[2][$i];
		}

		$qb = self::$quickBranches[$id];
		if($qb===0){$html='';if(isset(self::$bt7D0C6487[$textContent])){$n=self::$bt7D0C6487[$textContent];if($n<6)if($n<3)if($n===0)$html.='😢';elseif($n===1)$html.='😂';else$html.='😟';elseif($n===3)$html.='😄';elseif($n===4)$html.='😘';else$html.='😃';elseif($n<9)if($n===6)$html.='😮';elseif($n===7)$html.='😜';else$html.='😐';elseif($n===9)$html.='😉';elseif($n===10)$html.='😡';else$html.='😎';}else$html.=htmlspecialchars($textContent,0);}elseif($qb===1){$attributes+=array('discussionid'=>null,'number'=>null,'id'=>null,'username'=>null);$html='<a href="/d/'.$attributes['discussionid'].'/'.$attributes['number'].'" class="PostMention" data-id="'.$attributes['id'].'">'.str_replace('&quot;','"',$attributes['username']).'</a>';}elseif($qb===2){$html='<blockquote';if(!isset($attributes['author']))$html.=' class="uncited"';$html.='><div>';if(isset($attributes['author']))$html.='<cite>'.str_replace('&quot;','"',$attributes['author']).' wrote:</cite>';}else{$attributes+=array('username'=>null);$html='<a href="'.htmlspecialchars($this->params['PROFILE_URL'].htmlspecialchars_decode($attributes['username']),2).'" class="UserMention">@'.str_replace('&quot;','"',$attributes['username']).'</a>';}

		return $html;
	}
}