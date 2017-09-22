<?php
    

    class xmlhelper{
        
        public $xmldoc;
        public $docname;
        
        function __construct($name){
            $this->xmldoc= new DOMDocument();
            $this->docname=$name;
            $this->xmldoc->load($name);
        }
        
        function getname($name,$where,$call1,$call2,$qq){
            
            $root=$this->xmldoc->getElementsByTagName("班级")->item(0);
            
            $stu_node=$this->xmldoc->createElement("学生");
            
            
            $stu_node_name=$this->xmldoc->createElement("名字");
            $stu_node_name->nodeValue=$name;
            $stu_node->appendChild($stu_node_name);
            
            $stu_node_where=$this->xmldoc->createElement("所在地");
            $stu_node_where->nodeValue=$where;
            $stu_node->appendChild($stu_node_where);
            
            $stu_node_call1=$this->xmldoc->createElement("联系电话1");
            $stu_node_call1->nodeValue=$call1;
            $stu_node->appendChild($stu_node_call1);
            
            $stu_node_call2=$this->xmldoc->createElement("联系电话2");
            $stu_node_call2->nodeValue=$call2;
            $stu_node->appendChild($stu_node_call2);
            
            $stu_node_qq=$this->xmldoc->createElement("qq");
            $stu_node_qq->nodeValue=$qq;
            $stu_node->appendChild($stu_node_qq);
            
            $root->appendChild($stu_node);
            
            $this->xmldoc->save($this->docname);
        }
        
        function getnodeval(&$mynode,$tagname){
            return $mynode->getElementsByTagName($tagname)->item(0)->nodeValue;
        }
        
        function secxml(){
         $stus=$this->xmldoc->getElementsByTagName("学生");
         echo "共计有人数".$stus->length."<br/>";
         echo "<table border='1'>";
         
         for ($i=0;$i<$stus->length;$i++){
             $stu=$stus->item($i);
             echo "<tr>";
             echo "<td>".$this->getnodeval($stu,"名字")."</td>"."<td>".$this->getnodeval($stu,"所在地")."</td>"."<td>".$this->getnodeval($stu,"联系电话1")."</td>"."<td>".$this->getnodeval($stu,"联系电话2")."</td>"."<td>".$this->getnodeval($stu,"qq")."</td>";
             echo "</tr>";
         }
         echo "</table>";
            
        }
        
        function process(){
            $stus=$this->xmldoc->getElementsByTagName("学生");
            for ($i=0;$i<$stus->length;$i++){
                $stu=$stus->item($i);
                $student_name[$i]=$this->getnodeval($stu,"名字");
            }
            return $student_name;
        }
        
        function processcall($name){
            $stus=$this->xmldoc->getElementsByTagName("学生");
            for ($i=0;$i<$stus->length;$i++){
                $stu=$stus->item($i);
                
                if ($name==$this->getnodeval($stu,"名字")){
                    $call=$this->getnodeval($stu,"联系电话1");
                    break;
                }
            }
            return $call;
        }
        
        function processarray($name){
            $stus=$this->xmldoc->getElementsByTagName("学生");
            for ($i=0;$i<$stus->length;$i++){
                $stu=$stus->item($i);
                if ($name==$this->getnodeval($stu,"名字")){
                    $array[0]=$name;
                    $array[1]=$this->getnodeval($stu,"所在地");
                    $array[2]=$this->getnodeval($stu,"联系电话1");
                    $array[3]=$this->getnodeval($stu,"联系电话2");
                    $array[4]=$this->getnodeval($stu,"qq");
                    break;
                }
            }
            return $array;
        }
        
        function update($name,$where,$call1,$call2,$qq){
            $stus=$this->xmldoc->getElementsByTagName("学生");
            for ($i=0;$i<$stus->length;$i++){
                $stu=$stus->item($i);
                if ($name==$this->getnodeval($stu,"名字")){
                     $stu->getElementsByTagName("所在地")->item(0)->nodeValue=$where;
                     $stu->getElementsByTagName("联系电话1")->item(0)->nodeValue=$call1;
                     $stu->getElementsByTagName("联系电话2")->item(0)->nodeValue=$call2;
                     $stu->getElementsByTagName("qq")->item(0)->nodeValue=$qq;
                    break;
                }
            }
            $this->xmldoc->save($this->docname);
        }
    }

    
//     $name="赵四";
//     $where="韩国";
//     $call1="11111999";
//     $call2="5555555";
//     $qq="995558877";
//     $xmldoc = new xmlhelper("address.xml");
//     $xmldoc->update($name, $where, $call1, $call2, $qq);
//     $xmldoc->secxml();
//     $stu_name=$xmldoc->processarray("赵四");
//     var_dump($stu_name);
//     echo  "成功！";

?>