<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('あなたの生活習慣に関する情報をにゅうりょくしてください') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    {{$questions->user_id}}
                    <form class="mb-6" action="{{ route('chart.update') }}" method="POST">
                        @csrf
                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q1 食事の時間は決まっていますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q1" value=0 <?php if($questions->q1 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q1" value=1 <?php if($questions->q1 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q2 朝食をほぼ毎日とりますか？ {{$questions -> q2}} </label>
                            <label><input type="radio" name="q2" value=0 <?php if($questions->q2 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q2" value=1 <?php if($questions->q2 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q3 寝る2時間以内に食事をしていますか？ {{$questions -> q3}}</label>
                            <label><input type="radio" name="q3" value=0 <?php if($questions->q3 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q3" value=1 <?php if($questions->q3 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q4 よく噛んでゆっくり食べるようにしていますか？ {{$questions -> q4}}</label>
                            <label><input type="radio" name="q4" value=0 <?php if($questions->q4 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q4" value=1 <?php if($questions->q4 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q5 バランスの良い食事をしていますか？ {{$questions -> q5}}</label>
                            <label><input type="radio" name="q5" value=0 <?php if($questions->q5 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q5" value=1 <?php if($questions->q5 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q6 糖分の入った飲み物を定期的に飲みますか？ {{$questions -> q6}}</label>
                            <label><input type="radio" name="q6" value=0 <?php if($questions->q6 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q6" value=1 <?php if($questions->q6 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q7 習慣的に間食をしていますか？ {{$questions -> q7}}</label>
                            <label><input type="radio" name="q7" value=0 <?php if($questions->q7 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q7" value=1 <?php if($questions->q7 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q8 塩分の多い食材や濃い味付けのものを毎日食べていますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q8" value=0 <?php if($questions->q8 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q8" value=1 <?php if($questions->q8 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q9 外食、惣菜、市販の弁当を習慣的に食べますか？ </label>
                            
                            <label><input type="hidden" name="q9_1" value="0" >
                            <input type="checkbox" name="q9_1" value = "1" <?php if($questions->q9_1 === 1){print "checked";}?> >食べない</label>
                            <label><input type="hidden" name="q9_2" value="0" >
                            <input type="checkbox" name="q9_2" value = "1" <?php if($questions->q9_2 === 1){print "checked";}?> >朝食</label>
                            <label><input type="hidden" name="q9_3" value="0" >
                            <input type="checkbox" name="q9_3" value = "1" <?php if($questions->q9_3 === 1){print "checked";}?> >昼食</label>
                            <label><input type="hidden" name="q9_4" value="0" >
                            <input type="checkbox" name="q9_4" value = "1" <?php if($questions->q9_4 === 1){print "checked";}?> >夕食</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q10 習慣的にお酒を飲みますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q10" value=0 <?php if($questions->q10 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q10" value=1 <?php if($questions->q10 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q11 食事は主に誰が作りますか？ {{$questions -> q11}}</label>
                            <label><input type="radio" name="q11" value=0 <?php if($questions->q11 === 0){print "checked";}?>>自分</label>
                            <label><input type="radio" name="q11" value=1 <?php if($questions->q11 === 1){print "checked";}?>>自分以外</label>
                            <label><input type="radio" name="q11" value=2 <?php if($questions->q11 === 2){print "checked";}?>>決まっていない</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q12 これまでにダイエットやトレーニングで食生活を変えようとした経験はありますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q12" value=0 <?php if($questions->q12 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q12" value=1 <?php if($questions->q12 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q13 このサービスをご利用される目的は何ですか？ (複数選択可) {{$questions -> q4}}{{$questions -> q5}}{{$questions -> q6}}{{$questions -> q7}}</label>
                            <label><input type="hidden" name="q13_1" value="0" >
                            <input type="checkbox" name="q13_1" value = "1" <?php if($questions->q13_1 === 1){print "checked";}?> >ダイエット</label>
                            <label><input type="hidden" name="q13_2" value="0" >
                            <input type="checkbox" name="q13_2" value = "1" <?php if($questions->q13_2 === 1){print "checked";}?> >老化予防、若々しさの維持</label>
                            <label><input type="hidden" name="q13_3" value="0" >
                            <input type="checkbox" name="q13_3" value = "1" <?php if($questions->q13_3 === 1){print "checked";}?> >美容</label>
                            <label><input type="hidden" name="q13_4" value="0" >
                            <input type="checkbox" name="q13_4" value = "1" <?php if($questions->q13_4 === 1){print "checked";}?> >体力の維持、向上</label>
                            <label><input type="hidden" name="q13_5" value="0" >
                            <input type="checkbox" name="q13_5" value = "1" <?php if($questions->q13_5 === 1){print "checked";}?> >筋肉を効率良く付けたい</label>
                            <label><input type="hidden" name="q13_6" value="0" >
                            <input type="checkbox" name="q13_6" value = "1" <?php if($questions->q13_6 === 1){print "checked";}?> >コンディショニング(疲労の回復、パフォーマンスの向上等)</label>
                            <label><input type="hidden" name="q13_7" value="0" >
                            <input type="checkbox" name="q13_7" value = "1" <?php if($questions->q13_7 === 1){print "checked";}?> >病気の予防・改善（生活習慣病）</label>
                            <label><input type="hidden" name="q13_8" value="0" >
                            <input type="checkbox" name="q13_8" value = "1" <?php if($questions->q13_8 === 1){print "checked";}?> >その他</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q14 体重を定期的に測定していますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q14" value=0 <?php if($questions->q14 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q14" value=1 <?php if($questions->q14 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q15 体重を定期的に測定していますか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q15" value=0 <?php if($questions->q15 === 0){print "checked";}?>>3Kg増加</label>
                            <label><input type="radio" name="q15" value=1 <?php if($questions->q15 === 1){print "checked";}?>>ほぼ変わらない</label>
                            <label><input type="radio" name="q15" value=2 <?php if($questions->q15 === 2){print "checked";}?>>3Kg減少</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q16 現状の体重について、どうしたいですか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q16" value=0 <?php if($questions->q16 === 0){print "checked";}?>>できれば減らしたい</label>
                            <label><input type="radio" name="q16" value=1 <?php if($questions->q16 === 1){print "checked";}?>>現状を維持したい</label>
                            <label><input type="radio" name="q16" value=2 <?php if($questions->q16 === 2){print "checked";}?>>できれば増やしたい</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q17 １日の平均睡眠時間はどのくらいですか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q17" value=0 <?php if($questions->q17 === 0){print "checked";}?>>5時間未満</label>
                            <label><input type="radio" name="q17" value=1 <?php if($questions->q17 === 1){print "checked";}?>>5～6時間未満</label>
                            <label><input type="radio" name="q17" value=0 <?php if($questions->q17 === 2){print "checked";}?>>6～7時間未満</label>
                            <label><input type="radio" name="q17" value=0 <?php if($questions->q17 === 3){print "checked";}?>>7～8時間未満</label>
                            <label><input type="radio" name="q17" value=0 <?php if($questions->q17 === 4){print "checked";}?>>8時間以上</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q18 お通じの状態はどうですか？ {{$questions -> q1}}</label>
                            <label><input type="radio" name="q19" value=0 <?php if($questions->q19 === 0){print "checked";}?>>1日に1回以上</label>
                            <label><input type="radio" name="q19" value=1 <?php if($questions->q19 === 1){print "checked";}?>>2~3日に1回以上</label>
                            <label><input type="radio" name="q19" value=2 <?php if($questions->q19 === 2){print "checked";}?>>週1回以下</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q19 現在、運動や食事などの生活習慣について主治医より指導を受けていますか？ </label>
                            <label><input type="radio" name="q18" value=0 <?php if($questions->q18 === 0){print "checked";}?>>はい</label>
                            <label><input type="radio" name="q18" value=1 <?php if($questions->q18 === 1){print "checked";}?>>いいえ</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q20 食生活を改善してみようと思いますか？ </label>
                            <label><input type="radio" name="q20" value=0 <?php if($questions->q20 === 0){print "checked";}?>>食生活を改善することは考えていない</label>
                            <label><input type="radio" name="q20" value=1 <?php if($questions->q20 === 1){print "checked";}?>>食生活を改善した方がいいとは思っているが、実際に食生活を変えていない</label>
                            <label><input type="radio" name="q20" value=2 <?php if($questions->q20 === 2){print "checked";}?>>食生活をすぐに改善するつもりがある</label>
                            <label><input type="radio" name="q20" value=3 <?php if($questions->q20 === 3){print "checked";}?>>既に改善に取り組んでいる（６ヶ月未満）</label>
                            <label><input type="radio" name="q20" value=4 <?php if($questions->q20 === 4){print "checked";}?>>既に改善に取り組んでいる（６ヶ月以上）</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q21 食生活を変える場合、どのようなサポートを受けたいですか？ </label>
                            <label><input type="radio" name="q21" value=0 <?php if($questions->q21 === 0){print "checked";}?>>早く結果につながるためのサポート</label>
                            <label><input type="radio" name="q21" value=1 <?php if($questions->q21 === 1){print "checked";}?>>褒められたり、共感されたりすることが多いサポート</label>
                            <label><input type="radio" name="q21" value=2 <?php if($questions->q21 === 2){print "checked";}?>>データや根拠を元にしたサポート</label>
                            <label><input type="radio" name="q21" value=3 <?php if($questions->q21 === 3){print "checked";}?>>できていることや努力に目を向け励ましてもらえるようなサポート</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q22 現在治療中の疾患はありますか？(複数選択可) </label>
                            <label><input type="hidden" name="q22_1" value="0" >
                            <input type="checkbox" name="q22_1" value = "1" <?php if($questions->q22_1 === 1){print "checked";}?> >特になし</label>
                            <label><input type="hidden" name="q22_2" value="0" >
                            <input type="checkbox" name="q22_2" value = "1" <?php if($questions->q22_2 === 1){print "checked";}?> >肥満症・メタボリックシンドローム</label>
                            <label><input type="hidden" name="q22_3" value="0" >
                            <input type="checkbox" name="q22_3" value = "1" <?php if($questions->q22_3 === 1){print "checked";}?> >高血圧</label>
                            <label><input type="hidden" name="q22_4" value="0" >
                            <input type="checkbox" name="q22_4" value = "1" <?php if($questions->q22_4 === 1){print "checked";}?> >脂質異常症（高脂血症）</label>
                            <label><input type="hidden" name="q22_5" value="0" >
                            <input type="checkbox" name="q22_5" value = "1" <?php if($questions->q22_5 === 1){print "checked";}?> >糖尿病</label>
                            <label><input type="hidden" name="q22_6" value="0" >
                            <input type="checkbox" name="q22_6" value = "1" <?php if($questions->q22_6 === 1){print "checked";}?> >CKD（慢性腎臓病）</label>
                            <label><input type="hidden" name="q22_7" value="0" >
                            <input type="checkbox" name="q22_7" value = "1" <?php if($questions->q22_7 === 1){print "checked";}?> >心臓病・不整脈</label>
                            <label><input type="hidden" name="q22_8" value="0" >
                            <input type="checkbox" name="q22_8" value = "1" <?php if($questions->q22_8 === 1){print "checked";}?> >高尿酸血症・痛風</label>
                            <label><input type="hidden" name="q22_9" value="0" >
                            <input type="checkbox" name="q22_9" value = "1" <?php if($questions->q22_9 === 1){print "checked";}?> >動脈硬化</label>
                            <label><input type="hidden" name="q22_10" value = "0">
                            <input type="checkbox" name="q22_10" value = "1" <?php if($questions->q22_10 === 1){print "checked";}?> >脂肪肝</label>
                            <label><input type="hidden" name="q22_11" value = "0">
                            <input type="checkbox" name="q22_11" value = "1" <?php if($questions->q22_11 === 1){print "checked";}?> >その他</label>
                        </div>

                        <div class="flex flex-col mb-4">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q23 食物アレルギーで避けた方が良い食品はありますか？(複数選択可) </label>
                            <label><input type="hidden" name="q23_1" value="0" >
                            <input type="checkbox" name="q23_1" value = "1" <?php if($questions->q23_1 === 1){print "checked";}?> >特になし</label>
                            <label><input type="hidden" name="q23_2" value="0" >
                            <input type="checkbox" name="q23_2" value = "1" <?php if($questions->q23_2 === 1){print "checked";}?> >えび</label>
                            <label><input type="hidden" name="q23_3" value="0" >
                            <input type="checkbox" name="q23_3" value = "1" <?php if($questions->q23_3 === 1){print "checked";}?> >かに</label>
                            <label><input type="hidden" name="q23_4" value="0" >
                            <input type="checkbox" name="q23_4" value = "1" <?php if($questions->q23_4 === 1){print "checked";}?> >小麦</label>
                            <label><input type="hidden" name="q23_5" value="0" >
                            <input type="checkbox" name="q23_5" value = "1" <?php if($questions->q23_5 === 1){print "checked";}?> >そば</label>
                            <label><input type="hidden" name="q23_6" value="0" >
                            <input type="checkbox" name="q23_6" value = "1" <?php if($questions->q23_6 === 1){print "checked";}?> >卵</label>
                            <label><input type="hidden" name="q23_7" value="0" >
                            <input type="checkbox" name="q23_7" value = "1" <?php if($questions->q23_7 === 1){print "checked";}?> >乳製分</label>
                            <label><input type="hidden" name="q23_8" value="0" >
                            <input type="checkbox" name="q23_8" value = "1" <?php if($questions->q23_8 === 1){print "checked";}?> >落花生</label>
                            <label><input type="hidden" name="q23_9" value="0">
                            <input type="checkbox" name="q23_9" value = "1" <?php if($questions->q23_9 === 1){print "checked";}?> >あわび</label>
                            <label><input type="hidden" name="q23_10" value="0">
                            <input type="checkbox" name="q23_10" value = "1" <?php if($questions->q23_10 === 1){print "checked";}?> >いか</label>
                            <label><input type="hidden" name="q23_11" value="0">
                            <input type="checkbox" name="q23_11" value = "1" <?php if($questions->q23_11 === 1){print "checked";}?> >いくら</label>
                            <label><input type="hidden" name="q23_12" value="0">
                            <input type="checkbox" name="q23_12" value = "1" <?php if($questions->q23_12 === 1){print "checked";}?> >オレンジ</label>
                            <label><input type="hidden" name="q23_13" value="0">
                            <input type="checkbox" name="q23_13" value = "1" <?php if($questions->q23_13 === 1){print "checked";}?> >カシューナッツ</label>
                            <label><input type="hidden" name="q23_14" value="0">
                            <input type="checkbox" name="q23_14" value = "1" <?php if($questions->q23_14 === 1){print "checked";}?> >キウイフルーツ</label>
                            <label><input type="hidden" name="q23_15" value="0">
                            <input type="checkbox" name="q23_15" value = "1" <?php if($questions->q23_15 === 1){print "checked";}?> >牛肉</label>
                            <label><input type="hidden" name="q23_16" value="0">
                            <input type="checkbox" name="q23_16" value = "1" <?php if($questions->q23_16 === 1){print "checked";}?> >くるみ</label>
                            <label><input type="hidden" name="q23_17" value="0">
                            <input type="checkbox" name="q23_17" value = "1" <?php if($questions->q23_17 === 1){print "checked";}?> >ごま</label>
                            <label><input type="hidden" name="q23_18" value="0">
                            <input type="checkbox" name="q23_18" value = "1" <?php if($questions->q23_18 === 1){print "checked";}?> >さけ</label>
                            <label><input type="hidden" name="q23_19" value="0">
                            <input type="checkbox" name="q23_19" value = "1" <?php if($questions->q23_19 === 1){print "checked";}?> >さば</label>
                            <label><input type="hidden" name="q23_20" value="0">
                            <input type="checkbox" name="q23_20" value = "1" <?php if($questions->q23_20 === 1){print "checked";}?> >大豆</label>
                            <label><input type="hidden" name="q23_21" value="0">
                            <input type="checkbox" name="q23_21" value = "1" <?php if($questions->q23_21 === 1){print "checked";}?> >鶏肉</label>
                            <label><input type="hidden" name="q23_22" value="0">
                            <input type="checkbox" name="q23_22" value = "1" <?php if($questions->q23_22 === 1){print "checked";}?> >バナナ</label>
                            <label><input type="hidden" name="q23_23" value="0">
                            <input type="checkbox" name="q23_23" value = "1" <?php if($questions->q23_23 === 1){print "checked";}?> >豚肉</label>
                            <label><input type="hidden" name="q23_24" value="0">
                            <input type="checkbox" name="q23_24" value = "1" <?php if($questions->q23_24 === 1){print "checked";}?> >まつたけ</label>
                            <label><input type="hidden" name="q23_25" value="0" >
                            <input type="checkbox" name="q23_25" value = "1" <?php if($questions->q23_25 === 1){print "checked";}?> >もも</label>
                            <label><input type="hidden" name="q23_26" value="0" >
                            <input type="checkbox" name="q23_26" value = "1" <?php if($questions->q23_26 === 1){print "checked";}?> >やまいも</label>
                            <label><input type="hidden" name="q23_27" value="0" >
                            <input type="checkbox" name="q23_27" value = "1" <?php if($questions->q23_27 === 1){print "checked";}?> >りんご</label>
                            <label><input type="hidden" name="q23_28" value="0" >
                            <input type="checkbox" name="q23_28" value = "1" <?php if($questions->q23_28 === 1){print "checked";}?> >ゼラチン</label>
                            <label><input type="hidden" name="q23_29" value="0" >
                            <input type="checkbox" name="q23_29" value = "1" <?php if($questions->q23_29 === 1){print "checked";}?> >その他</label>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">
                            Q24 自分の健康のために特に気を付けていることはありますか？複数選択可 </label>
                            <label><input type="hidden" name="q24_1" value="0" >
                            <input type="checkbox" name="q24_1" value = "1" <?php if($questions->q24_1 === 1){print "checked";}?> >特になし</label>
                            <label><input type="hidden" name="q24_2" value="0" >
                            <input type="checkbox" name="q24_2" value = "1" <?php if($questions->q24_2 === 1){print "checked";}?> >塩分や資質を取り過ぎないように意識している</label>
                            <label><input type="hidden" name="q24_3" value="0" >
                            <input type="checkbox" name="q24_3" value = "1" <?php if($questions->q24_3 === 1){print "checked";}?> >サプリメントを利用して栄養を補っている</label>
                            <label><input type="hidden" name="q24_4" value="0" >
                            <input type="checkbox" name="q24_4" value = "1" <?php if($questions->q24_4 === 1){print "checked";}?> >甘いものを控えるようにしている</label>
                            <label><input type="hidden" name="q24_5" value="0" >
                            <input type="checkbox" name="q24_5" value = "1" <?php if($questions->q24_5 === 1){print "checked";}?> >タンパク質を多く食べるようにしている</label>
                            <label><input type="hidden" name="q24_6" value="0" >
                            <input type="checkbox" name="q24_6" value = "1" <?php if($questions->q24_6 === 1){print "checked";}?> >野菜を多く食べるようにしている</label>
                            <label><input type="hidden" name="q24_7" value="0" >
                            <input type="checkbox" name="q24_7" value = "1" <?php if($questions->q24_7 === 1){print "checked";}?> >定期的に体重計もしくは体組成計を測っている</label>
                            <label><input type="hidden" name="q24_8" value="0">
                            <input type="checkbox" name="q24_8" value="1" <?php if($questions->q24_8 === 1){print "checked";}?>>健康情報の科学的根拠を重視している</label>
                            <label><input type="hidden" name="q24_9" value="0">
                            <input type="checkbox" name="q24_9" value="1" <?php if($questions->q24_9 === 1){print "checked";}?>>できる限り自炊するようにしている</label>
                            <label><input type="hidden" name="q24_10" value="0">
                            <input type="checkbox" name="q24_10" value="1" <?php if($questions->q24_10 === 1){print "checked";}?>>その他</label>
                        </div>

                        

                        <button type="submit"
                                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    更新
                        </button>

                        <script> 
                            //javascript でチェックボックスで食べないを選択すると、朝食、昼食、夕食のチェックが外れるようにした
                            document.querySelector("input[name=q9_1]").addEventListener("click", function() {
                                if (this.checked) {
                                    document.querySelector("input[name=q9_2]").checked = false;
                                    document.querySelector("input[name=q9_3]").checked = false;
                                    document.querySelector("input[name=q9_4]").checked = false;
                                }
                                });

                            document.querySelectorAll("input[name='q9_2'], input[name='q9_3'], input[name='q9_4']").forEach(function(elem) {
                                elem.addEventListener("click", function() {
                                document.querySelector("input[name='q9_1']").checked = false;
                                });
                            });
                            
                            
                            
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
