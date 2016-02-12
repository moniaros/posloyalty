
/* global select_utilities, REWARDS, _, form_utilities */

(function () {

    var _rewardValueTextTmp;
    var _rewardValueProductsTmp;

    var reward;

    $(document).ready(function () {

        try {
            reward = JSON.parse($('meta[name=reward]').attr('content'));
        } catch (e) {
            reward = {};
        }

        initializeTemplates();
        initializeActions();
        initializeUI();

        console.log(reward);

        if (reward) {
            setFormEditMode(reward);
            form_utilities.setFieldValues("#reward_form", reward);
        }

    });

    function initializeTemplates() {

        _rewardValueTextTmp = _.template($('#reward_value_text_template').html());
        _rewardValueProductsTmp = _.template($('#reward_value_products_template').html());

    }

    function setFormEditMode(reward) {
        $("#reward_form").attr("action", "/rewards/" + reward.id);
        $("#reward_form").append('<input name="_method" type="hidden" value="PUT">');
    }

    function initializeActions() {
        $("[name=reward_condition]").on('change', function (e) {
            var rewardCondition = $(this).val();

            if (REWARDS.conditions[rewardCondition]) {
                select_utilities.setSelectOptions("[name=condition]", REWARDS.conditions[rewardCondition]);

                if (rewardCondition === "first_use") {
                    $("[name=condition]").attr('readonly', 'true');
                    $("[name=condition_product_id]").attr('readonly', 'true');

                    $('.reward_condition_fields').css('display', 'none');
                } else if (rewardCondition === "purchase_amount") {
                    $("[name=condition_product_id]").attr('readonly', 'true');
                    $('.condition_product_id_container').css('display', 'none');

                    $("[name=condition]").removeAttr('readonly');
                    $('.reward_condition_fields').css('display', 'block');

                } else {
                    $("[name=condition]").removeAttr('readonly');
                    $("[name=condition_product_id]").removeAttr('readonly');
                    $('.condition_product_id_container').css('display', 'block');

                    $('.reward_condition_fields').css('display', 'block');
                }
            } else {
                console.error(rewardCondition + " conditions not found");
            }
        });

        $("[name=reward_type]").on('change', function () {

            var rewardType = $(this).val();
            setRewardValueField(rewardType);

        });

    }

    function initializeUI() {

        $('.reward_condition_fields').css('display', 'none');
        select_utilities.setSelectOptions("[name=reward_condition]", REWARDS.conditionTypes);
        select_utilities.setSelectOptions("[name=reward_type]", REWARDS.types);
        $('#reward_value_container').html(_rewardValueTextTmp());

        $('.datetimepicker').datetimepicker();

    }

    function setRewardValueField(rewardType) {

        if (rewardType === "free_product") {
            $('#reward_value_container').html(_rewardValueProductsTmp());
        } else {
            $('#reward_value_container').html(_rewardValueTextTmp());
        }

    }

})();
